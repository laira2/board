
<template>
    <div class="card flex justify-center">
        <Checkbox v-model="checked" binary />
    </div>
</template>

<script setup>
import { ref } from "vue";
import Checkbox from 'primevue/checkbox';
const checked = ref(false);
</script>
