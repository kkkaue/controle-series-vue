<template>
  <MainLayout title="Series">
    <ul>
      <li v-for="(serie, index) in series" :key="index">
        {{ serie }}
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
const props = defineProps({
  series: {
    type: Array,
    required: true,
  },
});
</script>