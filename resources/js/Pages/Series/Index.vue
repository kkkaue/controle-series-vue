<template>
  <MainLayout title="Series">
    <SuccessMessage v-if="$page.props.flash.success">
      {{ $page.props.flash.success }}
    </SuccessMessage>
    <ButtonLink :href="route('series.create')" >
      Adicionar Série
    </ButtonLink>
    <ul class="mt-4">
      <li v-for="(serie, index) in series" :key="index" class="py-2 px-4 bg-white shadow mb-4 rounded flex justify-between items-center">
        {{ serie.title }}

        <form @submit.prevent="form.delete(route('series.destroy', serie.id))" class="inline-block">
          <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 mt-4 hover:bg-red-600">
            Excluir
          </button>
        </form>
      </li>
    </ul>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
import SuccessMessage from '@/Components/SuccessMessage.vue';

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