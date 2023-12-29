<template>
  <MainLayout title="Adicionar Série">
    <ButtonLink :href="route('series.index')" >
      Voltar
    </ButtonLink>
    <form action="post" class="mt-4">
      <label for="name" class="block mb-2">
        Nome da Série:
      </label>
      <input type="text" name="name" id="name" class="border border-gray-400 p-2 rounded w-full" />
    </form>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
</script>