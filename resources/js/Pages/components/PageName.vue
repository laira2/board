<script setup>

const props = defineProps({
  title: String
});

</script>

<template>
    <h1 class="bg-red-300">{{ props.title }}</h1>
</template>