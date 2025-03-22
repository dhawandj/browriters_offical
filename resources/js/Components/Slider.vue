<script setup lang="ts">
import MySwiper from './MySwiper.vue';

</script>

<template>
     <div>
        <p class="mb-5 text-center capitalize underline underline-offset-8">
            what our bro's are saying
        </p>
    </div>
    <div class="slider">
      <div class="slide-track space-x-5">
          <div class="slide"><img src="http://127.0.0.1:8000/storage/uploads2/banner7.png" alt="Image 2"></div>
          <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/banner2.png" alt="Image 3"></div>
          <div class="slide"> <img src="http://srv753447.hstgr.cloud/storage/uploads2/banner3.jpg" alt="Image 1"></div>
    
        <!-- Repeat to create the loop -->
        <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/one.webp" alt="Image 1"></div>
        <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/two.webp" alt="Image 2"></div>
        <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/four.webp" alt="Image 3"></div>
        <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/one.webp" alt="Image 4"></div>
        <div class="slide"><img src="http://srv753447.hstgr.cloud/storage/uploads2/one.webp" alt="Image 5"></div>
      </div>
    </div>
  </template>
  
  <style scoped>
  .slider {
      width: 100%;
      overflow: hidden;
      background: transparent;
      height: fit-content;
  }
  
  /* Allow scrolling on mobile */
  @media (hover: none) {
      .slider {
          /* overflow-x: scroll; */
          scroll-behavior: smooth;
      }
      .slide-track {
          animation-play-state: paused;
      }
  }
  
  /* Infinite Scroll Animation */
  .slide-track {
      display: flex;
      width: calc(300px * 10); /* Adjust based on number of slides */
      animation: scroll 50s linear infinite;
  }
  
  /* Pause animation on hover for desktop */
  .slider:hover .slide-track {
      animation-play-state: paused;
  }
  
  .slide {
      width: 300px;
      height: 150px;
      flex-shrink: 0;
  }
  
  .slide img {
      width: 100%;
      height: 100%;
      border-radius: 10px;
  }
  
  @keyframes scroll {
      0% {
          transform: translateX(0);
      }
      100% {
          transform: translateX(calc(-300px * 5)); /* Adjust for smooth looping */
      }
  }
  </style>
  