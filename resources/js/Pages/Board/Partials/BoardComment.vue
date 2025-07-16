<template>
    <Card style="overflow: hidden" >
        <template #title>
            <div class="flex justify-between m-4 w-full">
                댓글
            </div>
            </template> 
        <template #subtitle>
        </template>
        <template #content class="h ">
            <div class="h-auto m-4" v-if="comments != null">
                <Comments :comments="comments" :board-id="board.id" />
            </div>                
        </template>
        <template #footer>
            <CommentForm :board-id="board.id" />
        </template>
        </Card>
</template>
<script setup>
import { ref } from 'vue';
import Comments from './Comments.vue';
import CommentForm from './CommentForm.vue';

const props = defineProps({
  board: {
        type: Object
    },
  comments: {
        type: Array
    },
});

const showComments = ref(false)

const toggleComments = () => {
  showComments.value = !showComments.value
}



</script>
