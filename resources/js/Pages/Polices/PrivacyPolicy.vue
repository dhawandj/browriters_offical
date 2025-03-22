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
        <nav class="sticky left-0 top-0 flex  items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Privacy Polices</p>
        </nav>

     <div class="container mx-auto p-4 text-gray-800">
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-12">
      <h1 class="text-3xl font-bold mb-4">Privacy Policy</h1>
      <p class="text-sm text-gray-500 mb-6">Last updated: January 24, 2025</p>

      <div class="space-y-6">
        <section>
          <p>This Privacy Policy describes Our policies and procedures on the collection, use, and disclosure of Your
            information when You use the Service and tells You about Your privacy rights and how the law protects You.
          </p>
          <p>
            We collect Personal Data from you to provide and improve our Service. By using our Service, you agree to the
            collection and use of information in accordance with this Privacy Policy.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Interpretation and Definitions</h2>
          <h3 class="text-xl font-semibold mb-1">Interpretation</h3>
          <p>The words with capitalized initials have meanings defined under the following conditions.</p>

          <h3 class="text-xl font-semibold mt-4 mb-1">Definitions</h3>
          <ul class="list-disc ml-6 space-y-2">
            <li><strong>Account:</strong> A unique account created for You to access our Service.</li>
            <li><strong>Company:</strong> Refers to browriters, accessible from https://browriters.com.</li>
            <li><strong>Cookies:</strong> Small files placed on Your device by a website containing details of Your browsing history.</li>
            <li><strong>Personal Data:</strong> Information such as name, email address, phone number, address, and uploaded notes.</li>
            <li><strong>Service:</strong> The services provided by browriters.com, including book collection, writing, and delivery.</li>
            <li><strong>You:</strong> The individual using the Service, or the legal entity they represent.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Collecting and Using Your Personal Data</h2>
          <p>
            We collect personal information including your name, phone number, email address, address, and uploaded notes to provide our services effectively. This data is used for communication, processing orders, and enhancing user experience.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Cookies and Tracking Technologies</h2>
          <p>
            We use cookies and similar tracking technologies to monitor the activity on our Service and hold certain information.
            You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Third-Party Services</h2>
          <p>
            We may use third-party services such as Google Analytics and Google AdSense to monitor and analyze the use of our service.
            These services may collect information such as your IP address, browser type, and browsing activity.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Security of Your Personal Data</h2>
          <p>
            The security of Your Personal Data is important to Us, but no method of transmission over the Internet or electronic storage is 100% secure.
            While we strive to use commercially acceptable means to protect your data, we cannot guarantee its absolute security.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
          <p>
            If you have any questions about this Privacy Policy, You can contact us at: <strong>support@browriters.com</strong>
          </p>
        </section>
      </div>
    </div>
  </div>
            


        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
