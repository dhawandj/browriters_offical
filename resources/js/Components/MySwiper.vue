<script setup>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
import { router } from '@inertiajs/vue3';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

// Import required modules
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

function goLink(urlname,param=null) {
    router.get(route(urlname,param))
}

</script>
<template>
    <swiper 
      :spaceBetween="30"
      :centeredSlides="true"
      :autoplay="{
        delay: 2000,
        disableOnInteraction: false,
      }"
      :pagination="{
        clickable: true,
        dynamicBullets: true,
      }"
      :navigation="false"
      :modules="[Autoplay, Pagination, Navigation]"
      class="mySwiper text-black p-2 min-h-44  h-44 sm:h-64 md:h-full rounded-xl"
    >
      <swiper-slide @click="goLink('billing','assignment')" > <img src="http://srv753447.hstgr.cloud/storage/uploads2/ad1.png" alt=""> </swiper-slide>
      <swiper-slide @click="goLink('billing','mixed')" > <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner11.png" alt=""> </swiper-slide>
      <swiper-slide @click="goLink('billing','record')"> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner9.png" alt=""> </swiper-slide>
      <swiper-slide @click="goLink('jobs')"> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner10.png" alt=""> </swiper-slide>

    </swiper>
  </template>
  

  