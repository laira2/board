<template>
    <Card class="p-1 m-1" >
        <template #content class="p-1 m-1">
            <slot />
        </template>
    </Card>
</template>
<script setup>

import Card from 'primevue/card';

</script>