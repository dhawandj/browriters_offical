<script setup>
import BookInfoCard from '@/Components/BookInfoCard.vue';
import FileUploadSpace from '@/Components/FileUploadSpace.vue';
import MyFooter from '@/Components/MyFooter.vue';
import ShippingOrderBtnSpace from '@/Components/ShippingOrderBtnSpace.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps(['order'])
</script>

<template>
    <Head title="Order" />
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
            <p class="flex-grow text-center">Bro Order</p>
        </nav>

        <!-- BookInfoCard -->
        <div class="mx-auto max-w-lg">
            <BookInfoCard :order="order" />
        </div>

        <!-- shipping & order info btn -->
        <div class="mx-auto max-w-lg">
            <ShippingOrderBtnSpace :order="order" />
        </div>

        <!-- file uploading spaces -->
        <div class="mx-5 sm:mx-auto max-w-lg rounded-2xl bg-secondaryAlt p-1 overflow-y-scroll  ">
            <FileUploadSpace  v-for="book in order.books" :book="book" />

        </div>

        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
