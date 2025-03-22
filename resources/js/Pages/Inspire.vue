<script setup>
import BookAnimation from '@/Components/BookAnimation.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Slider from '@/Components/Slider.vue';
import { Icon } from '@iconify/vue';
import { Link, router } from '@inertiajs/vue3';
const props = defineProps(['book']); //book = bookname

//  setTimeout(function () {
//   router.get(route('billing', { book: props.book }))  
//  },3000)
</script>

<template>
    <div class="h-screen space-y-10  bg-background text-white">
        <!-- nav section -->
        <nav class="mx-2 p-2">
            <Link href="/"  class="text-2xl leading-none">
                <span class="font-semibold text-primary">bro</span>writers.com
            </Link>
            <p class="text-sm text-secondary">
                Bangalore's last minute writing app
            </p>
        </nav>

        <!-- quation section -->
        <div
            class="mx-auto max-w-xs rounded-2xl bg-secondaryAlt p-3 text-center"
        >
            <p class="line-clamp-3 font-semibold">
                One Book can make a difference “not just for you” but for
                another students employment
            </p>
        </div>

        <!-- book animation -->
        <div   class="borde  sm:hidden">
            <!-- <img class="opacity-20 " src="./bookgif.gif" alt=""> -->
            <BookAnimation />
        </div>
        <div   class="borde hidden sm:block sm:max-w- sm:mx-auto">
            <!-- <img class="opacity-20 " src="./bookgif.gif" alt=""> -->
            <Slider />
        </div>

        <!-- options -->
        <div
            class="mx-5 sm:mx-auto max-w-sm flex items-center justify-center gap-2 rounded-xl bg-secondaryAlt p-2 text-secondary"
        >
            <Icon icon="material-symbols:info-outline" width="24" height="24" />
            <p>We charge ₹5 per side of a page</p>
        </div>
        <div
            class="mx-20 sm:mx-auto max-w-sm flex items-center justify-around gap-2 rounded-xl bg-secondaryAlt p-2 text-secondary"
        >
            <Icon icon="octicon:question-16" width="24" height="24" />
            <span>See Why ₹5</span>
            <Icon icon="weui:arrow-filled" width="14" height="26" />
        </div>

        <!-- continue link|btn -->

        <div>
            <Link replace :href="route('billing', { book: book })">
                <div
                    class="mx-auto hover:opacity-50 mt-10 flex max-w-56 items-center justify-center gap-3 rounded-xl bg-primary p-3 text-secondaryAlt"
                >
                    <p class="font-semibold">Continue</p>
                    <Icon icon="weui:arrow-filled" width="14" height="26" />
                </div>
            </Link>
        </div>
    </div>
</template>
