<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';

</script>
<template>
    <div class="a  flex justify-between bg-secondaryAlt p-3">
        <Link  :href="route('p.index',{comp:'Index'})" class="text-sm flex   items-end  underline underline-offset-4">Legal Polices <Icon icon="humbleicons:external-link" class="text-secondary" width="24" height="24" /></Link>
        <Link :href="route('home')" class="text-sm block"> © 2025 - browriters</Link>
    </div>
</template>
