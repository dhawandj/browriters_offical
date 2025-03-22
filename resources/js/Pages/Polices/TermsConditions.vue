<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';
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
            <p class="flex-grow text-center">Terms & Conditions</p>
        </nav>

        <div class="container mx-auto p-4 text-gray-800">
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-12">
      <h1 class="text-3xl font-bold mb-4">Terms and Conditions</h1>
      <p class="text-sm text-gray-500 mb-6">Last updated: January 24, 2025</p>

      <div class="space-y-6">
        <section>
          <p>Please read these terms and conditions carefully before using Our Service.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Interpretation and Definitions</h2>
          <h3 class="text-xl font-semibold mb-1">Interpretation</h3>
          <p>The words with capitalized initials have meanings defined under the following conditions.</p>

          <h3 class="text-xl font-semibold mt-4 mb-1">Definitions</h3>
          <ul class="list-disc ml-6 space-y-2">
            <li><strong>Affiliate:</strong> An entity controlling or controlled by the Company.</li>
            <li><strong>Country:</strong> Karnataka, India.</li>
            <li><strong>Company:</strong> Refers to browriters (https://browriters.com).</li>
            <li><strong>Device:</strong> Any device capable of accessing the Service (e.g., computers, phones, tablets).</li>
            <li><strong>Service:</strong> The website and services provided by browriters.com.</li>
            <li><strong>You:</strong> The individual or legal entity using the Service.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Acknowledgment</h2>
          <p>By accessing or using the Service, You agree to be bound by these Terms and Conditions. If You disagree with any part, You may not access the Service.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Termination</h2>
          <p>We may terminate or suspend Your access immediately for any reason, including if You breach these Terms.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Limitation of Liability</h2>
          <p>We are not liable for any damages that arise out of or relate to the use or inability to use our Service.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">"AS IS" and "AS AVAILABLE" Disclaimer</h2>
          <p>Our Service is provided "AS IS" and "AS AVAILABLE" without warranties of any kind.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Governing Law</h2>
          <p>The laws of Karnataka, India, govern these Terms and Your use of the Service.</p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
          <p>If you have any questions about these Terms and Conditions, contact us at: <strong>support@browriters.com<</strong></p>
        </section>
      </div>
    </div>
  </div>




        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
