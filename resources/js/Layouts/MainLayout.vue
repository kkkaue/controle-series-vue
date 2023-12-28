<template>
  <Head :title="title" />
  <h1>
    {{ title }}
  </h1>
  <slot />
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