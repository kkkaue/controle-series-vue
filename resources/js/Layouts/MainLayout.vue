<template>
  <Head :title="title" />
  <main class="container mx-auto my-4">
    <h1 class="text-2xl font-bold mb-4">
      {{ title }}
    </h1>
    <slot />
  </main>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>