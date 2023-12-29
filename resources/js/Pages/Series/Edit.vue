<template>
  <MainLayout title="Editar Série">
    <ButtonLink :href="route('series.index')" >
      Voltar
    </ButtonLink>

    <form @submit.prevent="form.put(route('series.update', serie.id))" class="mt-4">
      <label for="name" class="block mb-2">
        Título da Série:
      </label>
      <input v-model="form.title" type="text" name="title" id="title" class="border border-gray-400 p-2 rounded w-full" />
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
  serie: {
    type: Object,
    required: true,
  },
});
const form = useForm({
  title: props.serie.title,
});
</script>