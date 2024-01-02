<template>
  <MainLayout title="Adicionar Série">
    <ButtonLink :href="route('series.index')" >
      Voltar
    </ButtonLink>
    <form @submit.prevent="form.post(route('series.store'))" class="mt-4">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-8">
          <label for="title" class="block mb-2">
            Título da Série:
          </label>
          <input v-model="form.title" type="text" name="title" id="title" class="border border-gray-400 p-2 rounded w-full" />
        </div>
        <div class="col-span-12 md:col-span-2">
          <label for="seasons" class="block mb-2">
            Número de temporadas:
          </label>
          <input v-model="form.seasons" type="text" name="seasons" id="seasons" class="border border-gray-400 p-2 rounded w-full" />
        </div>
        <div class="col-span-12 md:col-span-2">
          <label for="episodes" class="block mb-2">
            Episódios por temporada:
          </label>
          <input v-model="form.episodes" type="text" name="episodes" id="episodes" class="border border-gray-400 p-2 rounded w-full" />
        </div>
      </div>
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

const form = useForm({
  title: '',
  seasons: '',
  episodes: '',
});
</script>