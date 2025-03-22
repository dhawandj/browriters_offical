<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RazorPayController;
use App\Models\Book;
use App\Models\BroJob;
use App\Models\DeliveryBoy;
use App\Models\File;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    // dd(Order::where('order_status', 'completed')->count());
    return Inertia::render('Home',[
        'userCount'=>User::count(),
        'jobsCount'=>BroJob::count(),
        'booksCount'=>Book::count()
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/inspire/{book}', function (string $book) {
        return Inertia::render('Inspire',[
            'book'=>$book
        ]);
    })->name("inspire");

    Route::get('/billing/{book}', function (string $book) {

        return Inertia::render('BooksBilling',[
            'book'=>$book,
            'offer'=> Order::where('user_id',Auth::id())->count()
        ]);
    })->name("billing");
    
    Route::get('/orders', function () {

        $orders = Order::where('user_id',Auth::id())
        ->latest()->with(['books'])->get();

        return Inertia::render('Orders',[
            'latestOrder'=>$orders->take(1),
            'orders'=>$orders->slice(1)
        ]);
    })->name("orders")->middleware('auth');
    
    Route::get('/order/{order}', function (Order $order) {
        $order->load(['books.files']);
        return Inertia::render('Order',[
            'order'=>$order
        ]);
    })->name("order");

    // more route 
    Route::get('/more',function ()  {
        return Inertia::render('More');
    })->name('more');
    
});

Route::get('/GoogleLogin', function () {
    return Inertia::render('GoogleLogin');
})->name("glogin");

// google OAuth routes
Route::get('/auth/redirect', function () {
     // If the user is already authenticated, redirect them to the intended URL
     if (Auth::check()) {
        return redirect()->intended('/');
    }
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/callback', function () {

    if (Auth::check()) {
        return redirect()->intended('/');
    }
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->email,
    ], [
        'name' => $googleUser->name,
        'password' => bcrypt('dummy_password'),
        // 'google_id' => $googleUser->id,
        'email_verified_at' => now(),
        // 'google_token' => $googleUser->token,
    ]);

    Auth::login($user);

    return redirect()->intended('/');
});

//razorpay routes
Route::post('/razorpay/create-order', [RazorPayController::class, 'createOrder'])->name('razorpay.create-order')->middleware('auth');
Route::post('/razorpay/verify-payment', [RazorPayController::class, 'verifyPayment'])->name('razorpay.verify-payment')->middleware('auth');


// file pond routes
// this showcasing the upload  how it will be
Route::post('dummyUpload', function () {

    // $path = request()->file('file')->store('uploads2');
    return response()->json([
        'error' => 'Make payment to upload files '
    ], Response::HTTP_FORBIDDEN); // 403 Forbidden status
})->name('dummyUpload')->withoutMiddleware(VerifyCsrfToken::class);

// file upload orignal to the public/uplods
Route::post('upload/{id}/', function (Request $request, $id) {
    // sleep(10);
    // dd($request->all());
    if ($request->file('file')===null) {
        return response()->json(['error' => 'No file received'], 400);
    }
    $file = $request->file('file');
    $path = $file->store('uploads', 'public');
    // store in db
    File::create([
        'book_id' => $id,
        'name' => $file->getClientOriginalName(),
        'url' => $path,
        'size' => $file->getSize(),
        'extension' => $file->getClientOriginalExtension()
    ]);
    return response()->json($path);
})->withoutMiddleware(VerifyCsrfToken::class)->name('upload');

// loading  files or imgs for filepond already uploaded
Route::get('loadFiles/{name}', function ($name) {

        // get the file with file name 
    $file = File::where('name', $name)->latest()->first();

       // check this file url exist or file exist 
    $path = storage_path('app/public/' . $file->url);

    if (file_exists($path)) {
        return response()->file($path);
    }

    return abort(404); // Return 404 if the file doesn't exist
});
// deleting the uploaded files 
Route::delete('delete/{fileName}',function ($fileName)  {
    $file = File::where('name', $fileName)->latest()->first();

    if ($file==null) {
        return back();
    }

     // Check if the file exists in the storage
     if (Storage::disk('public')->exists($file->url)) {

        // Delete the file from physical storage
        Storage::disk('public')->delete($file->url);
        // deleting in db 
        $file->delete();

        return  back();

    } else {
        return response()->json(['error' => 'File not found'], 404);
    };
    return back();
})->name('file.delete');


// shippig info store
Route::post('shipping-info/{order}/store',function (Request $request, Order $order)  {

    $validatedData = $request->validate([
        'p_address' => ['required', 'string', 'max:255'],
        'd_address' => ['required', 'string', 'max:255'],
        'pincode' => ['required', 'digits:6'],  // Assuming Indian PIN code format
        'phone' => ['required', 'digits:10', 'numeric'], // Validates Indian mobile numbers
    ]);

    $order->update($validatedData);
    
    
})->name('shippingInfo');

// route for storing book options
Route::post('books-options/{book}/store',function (Request $request , Book $book) {

        $book->update([
            'book_name'=>$request->book_name,
            'pen_color'=>$request->pen_color,
            'remarks'=>$request->remarks,
        ]);
        return back();

})->name('bookOptions');

// admin routes
Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin',function ()  {
    
        return Inertia::render('Admin',[
            'orders'=>Order::latest()->get(),
        ]);
    })->name('admin');

    Route::get('/admin/{order}',function (Order $order)  {
    
        return Inertia::render('AdminOrder',[
            'order'=>$order->load(['user','books.files']),
        ]);
    })->name('admin.order');

    Route::post('/admin/{order}/update/status',function (Order $order,Request $request)  {

    // dd($request->order_status['name']);
    //update status
    $order->update(['order_status'=>$request->order_status['name']]);
    return back();
        
    })->name('admin.update.status');


    // route for downloading zip files
    Route::get('/download-zip/{book}', function (Book $book) {

    // needed files and zipfilename
    $files = $book->files;
    if ($files->isEmpty()) {
        return back()->with('error', 'no files found');
    }

    $zipFileName = 'orderId-' . $book->order_id . '_' . $book->name . '.zip';
    $zip = new ZipArchive;

    if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE) {

        foreach ($files as $index =>  $file) {
            $filePath = Storage::path($file->url);
            $fileName = $file->name;
            $indexPlusOne = $index + 1;
            $extension = pathinfo($file->url, PATHINFO_EXTENSION);
            $customName = "browriters_{$indexPlusOne}_{$fileName}.{$extension}";

            // $customName = "browriters_" . ($index + 1) ."." . pathinfo($file->url, PATHINFO_EXTENSION);
            $zip->addFile($filePath, $customName); // Add the file with its original name or custom name
        }

        $zip->close();

        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }

    return response()->json(['error' => 'Unable to create zip file'], 500);
    })->name('download.zip');

    Route::delete('/delete-files/{book}', function (Book $book) {

        $files = $book->files;
    
        if ($files->isEmpty()) {
            return back()->with('error', 'No files found for this book.');
        }
    
        foreach ($files as $file) {
            // Delete the file from storage
            Storage::delete($file->url);
    
            // Optionally, delete the file record from the database
            $file->delete();
        }
    
        return back()->with('success', 'All files for the book have been successfully deleted.');
    })->name('delete.files');

});

// polices(dynamic) routes
Route::get('polices/{comp}',function ($comp) {
        $uc = ucfirst($comp);
    return Inertia::render('Polices/'.$uc);
})->name('p.index');

// jobs routes
Route::get('Jobs/',function () {
    return Inertia::render('Jobs');
})->name('jobs');

Route::post('Jobs/register',function (Request $request) {
   $validatedData =  $request->validate([
        'name'=>['required'],
        'phone'=>['required'],
        'email'=>['required'],
    ]);
    BroJob::updateOrCreate(['phone'=> $request->phone],$validatedData);
    return back()->with('msg', 'Job successfully registered or updated!');
})->name('jobs.register');

// filepond
Route::get('/filepond',function ()  {
   return Inertia::render("FilePondJs"); 
});

// update delivery boy number route
Route::patch('/deliveryBoyNumber',function (Request $request)  {

    $request->validate([
        'phone' => ['required', 'digits:10', 'numeric'],  // Validates a 10-digit phone number  // Ensures the ID exists in the database
    ]);
        // Assuming you are trying to update a specific record by ID
    DeliveryBoy::where('id', 1)->update(['phone' => $request->phone]);

    return back()->with('success', 'Phone number updated successfully!');
})->name('admin.update.phone');



