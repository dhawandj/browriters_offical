<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Polices" />
    <div class="relative  h-svh   space-y-10 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Legal Polices</p>
        </nav>

        <div class="mx-4 space-y-3  uppercase max-w-screen-sm sm:mx-auto rounded-2xl shadow-xl py-5 px-2">
            <Link :href="route('p.index',{comp:'PrivacyPolicy'})" class="flex justify-between items-center  p-2 hover:opacity-40  ">
                <p>Privacy Policy</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
            <Link :href="route('p.index',{comp:'TermsConditions'})"  class="flex justify-between items-center  p-2 hover:opacity-40">
                <p>Terms and conditions</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
            <Link :href="route('p.index',{comp:'CancellationRefund'})"  class="flex justify-between items-center  p-2 hover:opacity-40">
                <p>Cancellation and Refund</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
            <Link :href="route('p.index',{comp:'ContactUs'})" class="flex justify-between items-center  p-2 hover:opacity-40">
                <p>Contact Us</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
            <Link :href="route('p.index',{comp:'AboutUs'})" class="flex justify-between items-center  p-2 hover:opacity-40">
                <p>About Us</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
            <Link :href="route('p.index',{comp:'Disclaimer'})" class="flex justify-between items-center  p-2 hover:opacity-40">
                <p>DISCLAIMER</p>
                <Icon icon="weui:arrow-filled"width="30" height="30"/>
            </Link>
        </div>



        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
