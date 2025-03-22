<script setup>
import BroStats from '@/Components/BroStats.vue';
import CardBtn from '@/Components/CardBtn.vue';
import CardJobBtn from '@/Components/CardJobBtn.vue';
import IconBtn from '@/Components/IconBtn.vue';
import MyFooter from '@/Components/MyFooter.vue';
import MySwiper from '@/Components/MySwiper.vue';
import Slider from '@/Components/Slider.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
defineProps(['userCount','jobsCount','booksCount'])

const showBanner = ref(false);
setTimeout(()=>{
showBanner.value = true
},2000)
</script>
<template>
    <Head title="home" />

    <div class="bordr-2 mx-auto flex min-h-screen flex-col border-red-500 bg-background text-white">
        <!-- ads banner -->
        <div v-show="showBanner"  class="sticky  left-0 top-0 z-50 flex w-full justify-between bg-black/45 p-3 backdrop-blur-sm " >
            <h1 class="text-center capitalize">1st Order First Book writing Free</h1>
            <span @click="showBanner=false">x</span>
        </div>
        <!-- nav bar -->
        <nav>
            <h1 class="borde p-2 text-center text-xl font-semibold " >
                <span class=" text-primary  font-anton tracking-wider ">Bro</span><span class="font-anton text-sm  " >writers.com</span>
            </h1>
            <h1 class="text-center text-sm capitalize text-secondary font-semibold">
                Bangalore's last minute writing App
            </h1>
        </nav>

        <main class="mx-2 grid-cols-2 space-y-9 p-1 sm:grid ">
            <div class="p-2">
                <!-- <Carousel /> -->
                 <MySwiper />
            </div>
            <!-- card button  -->
            <div class="borde grid grid-cols-2 place-items-center gap-4">
                <CardBtn
                    href="inspire/observation"
                    :is-new="true"
                    name="Observation"
                />
                <CardBtn href="inspire/record" name="Record" />
                <CardBtn href="inspire/assignment" name="Assignment" />
                <CardJobBtn  />
            </div>

            <!-- icons button  -->
            <div class="mx-4 flex gap-10 items-center">
                <Link :href="route('orders')">
                    <IconBtn icon="solar:box-broken" label="My Orders" />
                </Link>
                <Link :href="route('more')">
                    <IconBtn icon="material-symbols:box" label="More" />
                </Link>
            </div>
            <!-- bro statictis -->
            <div>
                <BroStats :booksCount :jobsCount :userCount />
            </div>
            <!-- bro comments  -->
            <div class="col-span-2">
                <!-- <Comments /> -->
                 <Slider />
            </div>
        </main>

        <footer>
            <MyFooter />
        </footer>
    </div>
</template>
