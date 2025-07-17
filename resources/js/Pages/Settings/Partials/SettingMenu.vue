<script setup>
import PanelMenu from 'primevue/panelmenu';
</script>
<template>
    <div class="card flex justify-center">
        <PanelMenu :model="items" multiple class="w-full md:w-80" />
    </div>
</template>
