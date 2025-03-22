<script setup>
import LatestOrderCard from '@/Components/LatestOrderCard.vue';
import MyFooter from '@/Components/MyFooter.vue';
import OrdersList from '@/Components/OrdersList.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps(['latestOrder','orders'])
</script>

<template>
    <Head title="Orders" />

    <div  class="relative  min-h-screen space-y-10 bg-background text-white">
        <!-- nav bar -->
        <nav
            class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm"
        >
            <Icon
            @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Bro Orders</p>
        </nav>
        <!-- latest order -->
        <div class="max-w-xl mx-auto" v-if="latestOrder[0]" >
                <LatestOrderCard :latestOrder="latestOrder" />

        </div>

        <!-- list of orders |old orders list -->
        <div  v-if="latestOrder[0]"  class="space-y-5 max-w-xl mx-auto">

            <OrdersList  v-for="order in orders" :order="order"/>
        </div>

        <div v-else class="mx-5">
                <p class="p-4 rounded-2xl bg-secondaryAlt text-center capitalize underline underline-offset-2 font-semibold ">no orders yet made</p>
        </div>

        <footer class="absolute bottom-0 w-full">
            <MyFooter />
        </footer>
    </div>
</template>
