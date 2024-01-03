<template>
  <MainLayout :title="'Episódios de ' + series.title">
    <ButtonLink :href="route('seasons.index', series.id)" class="mb-4">
      Voltar
    </ButtonLink>
    <form @submit.prevent="form.post(route('episodes.watch', season.id))">
      <ul class="mt-4">
        <li v-for="(episode, index) in episodes" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded flex justify-between items-center">
          Episódio {{ episode.number }}

          <input type="checkbox" id="episodes" name="episodes[]" :value="episode.id" v-model="form.episodes" class="form-checkbox h-5 w-5 text-gray-600" />
        </li>
      </ul>
      <button type="submit" class="bg-gray-800 text-white rounded py-2 px-4 mt-4 hover:bg-gray-900">
        Salvar
      </button>
    </form>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  series: {
    type: Object,
    required: true,
  },
  season: {
    type: Object,
    required: true,
  },
  episodes: {
    type: Array,
    required: true,
  },
});

let watchedEpisodesIds = props.episodes.filter(episode => episode.watched).map(episode => episode.id);

let form = useForm({
  episodes: watchedEpisodesIds,
});

</script>