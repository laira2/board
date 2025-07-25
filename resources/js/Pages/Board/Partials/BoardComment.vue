<template>
    <ScrollArea class="h-screen rounded-md border p-4">
        <Card style="overflow: hidden" >
            <template #title class="m-0 p-0">
                댓글
            </template> 
            <template #subtitle>
            </template>
            <template #content >
                <div class="h-auto m-1 p-1" v-if="comments != null">
                    <Comments :comments="comments" :board-id="board.id" />
                </div>                
            </template>
            <template #footer>
                <CommentForm :board-id="board.id" />
            </template>
        </Card>
    </ScrollArea>
</template>
<script setup>
import { ref } from 'vue';
import Comments from './Comments.vue';
import CommentForm from './CommentForm.vue';
import { ScrollArea } from '@/Components/ui/scroll-area'

const props = defineProps({
  board: {
        type: Object
    },
  comments: {
        type: Array
    },
}); 
const showComments = ref(false)

</script>
