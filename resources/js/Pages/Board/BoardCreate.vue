<script setup lang="ts">
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import BoardForm from './Partials/BoardForm.vue';

</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <BoardForm />
        </GContentPanel>
    </BoardLayout>

</template>