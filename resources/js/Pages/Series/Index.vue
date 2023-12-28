<template>
  <MainLayout title="Series">
    <Link :href="route('series.create')">
      Adicionar nova Série
    </Link>
    <ul>
      <li v-for="(serie, index) in series" :key="index">
        {{ serie }}
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  series: {
    type: Array,
    required: true,
  },
});
</script>