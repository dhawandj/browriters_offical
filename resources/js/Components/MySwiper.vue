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

function goLink() {
    router.get(route('billing',{book:'observation'}))
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
      class="mySwiper text-black p-2  h-40 sm:h-64 rounded-xl"
    >
      <swiper-slide> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner11.png" alt=""> </swiper-slide>
      <swiper-slide> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner8.png" alt=""> </swiper-slide>
      <swiper-slide> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner9.png" alt=""> </swiper-slide>
      <swiper-slide> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner10.png" alt=""> </swiper-slide>

    </swiper>
  </template>
  

  