<template>
  <MainLayout :title="'Temporadas de ' + series.title">
    <ButtonLink :href="route('series.index')" >
      Voltar
    </ButtonLink>
    <ul class="mt-4">
      <li v-for="(season, index) in seasons" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded flex justify-between items-center">
        <a :href="route('episodes.index', season.id)" class="text-blue-500 hover:underline">
          Temporada {{ season.number }}
        </a>
        <span class="bg-gray-200 text-gray-700 rounded-full py-1 px-2 text-sm">
          {{ season.watched_episodes.length }} / {{ season.episodes.length }}
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