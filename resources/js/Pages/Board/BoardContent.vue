<script setup lang="ts">
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import BoardDetail from './Partials/BoardDetail.vue';

const props = defineProps({
    board: {
        type: Array
    },
    comments: {
        type: Array
    }
});
console.log("boardContent board:", props);

</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <BoardDetail :board="board" :comments="comments" />
        </GContentPanel>
    </BoardLayout>
</template>