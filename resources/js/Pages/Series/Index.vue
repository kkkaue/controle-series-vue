<template>
  <Head title="Series" />
  <ul>
    <li v-for="(serie, index) in series" :key="index">
      {{ serie }}
    </li>
  </ul>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  series: {
    type: Array,
    required: true,
  },
});
</script>