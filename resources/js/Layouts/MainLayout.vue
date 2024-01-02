<template>
  <Head :title="title" />
  <main class="container mx-auto my-4">
    <h1 class="text-2xl font-bold mb-4">
      {{ title }}
    </h1>
    <SuccessMessage v-if="$page.props.flash.success">
      {{ $page.props.flash.success }}
    </SuccessMessage>
    <div v-if="$page.props.errors">
      <ErrorMessage v-for="(error, key) in $page.props.errors" :key="key">
        {{ error[0] }}
      </ErrorMessage>
    </div>
    <slot />
  </main>
</template>

<script setup>
import SuccessMessage from '@/Components/SuccessMessage.vue';
import ErrorMessage from '@/Components/ErrorMessage.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>