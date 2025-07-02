<script setup lang="ts">
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import BoardForm from './Partials/BoardForm.vue';
const props = defineProps({
    board: {
        type: Array
    }
})
console.log("props 조회")
</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <BoardForm v-if="props.board" :board="props.board" />
            <BoardForm v-else />
        </GContentPanel>
    </BoardLayout>

</template>