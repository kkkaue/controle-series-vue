<template>
  <MainLayout title="Series">
    <ButtonLink :href="route('series.create')" >
      Adicionar Série
    </ButtonLink>
    <ul class="mt-4">
      <li v-for="(serie, index) in series" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded">
        {{ serie.title }}
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
const props = defineProps({
  series: {
    type: Array,
    required: true,
  },
});
</script>