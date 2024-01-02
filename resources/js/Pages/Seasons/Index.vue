<template>
  <MainLayout :title="'Temporadas de ' + series.title">
    <ButtonLink :href="route('series.index')" >
      Voltar
    </ButtonLink>
    <ul class="mt-4">
      <li v-for="(season, index) in seasons" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded flex justify-between items-center">
        Temporada {{ season.number }}
        <span class="flex gap-2">
          {{ season.episodes.length }}
        </span>
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

const props = defineProps({
  series: {
    type: Object,
    required: true,
  },
  seasons: {
    type: Array,
    required: true,
  },
});
</script>