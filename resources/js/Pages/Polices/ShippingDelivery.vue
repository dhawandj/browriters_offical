<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Policies" />
    <div class="relative h-svh space-y-10 bg-background text-white">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Shipping and Delivery Policy</p>
        </nav>

        <div class="container mx-auto p-4 text-gray-800">
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-12">
                <h1 class="text-3xl font-bold mb-4">Shipping and Delivery Policy</h1>
                <p class="text-sm text-gray-500 mb-6">Last updated: March 24, 2025</p>

                <div class="space-y-6">
                    <section>
                        <h2 class="text-2xl font-bold mb-2">Shipping Time</h2>
                        <p>
                            Orders are typically processed and shipped within <strong>0-2 days</strong> of placing the order. Once shipped, you will receive a confirmation email with tracking details, if applicable. Please note that shipping times may vary depending on your location and other external factors.
                        </p>
                        <p>
                            We strive to ensure timely delivery of all orders. However, unforeseen circumstances such as weather conditions, strikes, or other external factors may cause delays. We appreciate your patience and understanding in such cases.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-2">Delivery Methods</h2>
                        <p>
                            We offer delivery through reliable courier partners. Our services are primarily focused on the collection and delivery of handwritten books. Please make sure to provide accurate contact details and delivery addresses to avoid any delays.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-2">Contact Support</h2>
                        <p>
                            For any queries related to shipping or delivery, please contact us at:
                        </p>
                        <ul class="list-disc ml-6">
                            <li><strong>Email:</strong> support@browriters.com</li>
                            <li><strong>Phone:</strong> 8050859436</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>

        <footer class="fixed bottom-0 w-full">
            <MyFooter />
        </footer>
    </div>
</template>
