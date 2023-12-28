<template>
  <MainLayout title="Adicionar Série">
    <Link :href="route('series.index')">
      Voltar
    </Link>
    <form action="post">
      <label for="name">
        Nome da Série:
      </label>
      <input type="text" name="name" id="name" />
    </form>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>