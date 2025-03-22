<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps(['order'])
</script>

<template>
    <Head title="More" />
    <div class="relative  h-svh   space-y-10 bg-background text-white    ">
        <!-- nav bar -->

        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Link href="/"  class="absolute ml-2 font-semibold block">
                <Icon
                @click=""
                icon="weui:back-filled"
                class=""
                width="12"
                height="24"
                />
            </Link>
            <p class="flex-grow text-center">More</p>
        </nav>
        <Link :href="route('billing', { book: 'Mixed' })"  class="bg-white text-black mx-5 p-3 rounded-lg flex justify-between items-center hover:opacity-50">
            <div class=" flex flex-col justify-between ">
                <p class="font-semibold text-black ">Mixed Books</p>
                <p class="font-semibold text-sm mb-2 text-black/55 ">All categoryies</p>
                <p class=" font-bold p-2 px-3 capitalize bg-gray-200 rounded-xl ">order now</p>
            </div>
            <Icon icon="uil:books" width="100" height="100" />
        </Link>


        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
