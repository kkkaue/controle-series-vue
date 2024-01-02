<template>
  <MainLayout title="Series">
    <ButtonLink :href="route('series.create')" >
      Adicionar Série
    </ButtonLink>
    <ul class="mt-4">
      <li v-for="(serie, index) in series" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded flex justify-between items-center">
        <a :href="route('seasons.index', serie.id)" class="text-blue-500 hover:underline">
          {{ serie.title }}
        </a>

        <span class="flex gap-2">
          <ButtonLink :href="route('series.edit', serie.id)">
            Editar
          </ButtonLink>
          <form @submit.prevent="form.delete(route('series.destroy', serie.id))">
            <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 shadow hover:bg-red-600">
              Excluir
            </button>
          </form>
        </span>
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  series: {
    type: Array,
    required: true,
  },
});

const form = useForm({
  delete: {
    onSuccess: () => {
      form.reset();
      form.post(route('series.index'));
    },
  },
});
</script>