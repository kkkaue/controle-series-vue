<template>
  <Link :href="href" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded shadow">
    <slot />
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  href: {
    type: String,
    required: true,
  },
});
</script>