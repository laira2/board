<template>
    <div v-for="comment in comments" :key="comment.id">
        <Card :class="comment.depth > 0 ? 'mt-1 ml-1' : 'm-0.5 '">    
            <CardHeader class="m-0.5">
                <div class="flex justify-between">
                    <CardTitle>{{ comment.author }}</CardTitle>   
                    <CardDescription>{{ comment.updated_at }}</CardDescription>
                </div>
            </CardHeader>
            <CardContent class="m-0.5">
                <p v-if="comment.depth != 0" class="text-stone-500">@{{ parentAuthor }}</p>
                {{ comment.comment }} 
            </CardContent>
            
            <div class="ml-2 mt-2 p-1">
                <Button @click="toggleCommentForm(comment.id)" variant="text" label="댓글쓰기" severity="secondary"></Button>
                <Button @click="toggleReply(comment.id)" v-if="comment.all_children?.length!=0" variant="text" label="대댓글 보기" :badge="comment.all_children?.length || 0" severity="secondary"></Button>
            </div>
            <CardFooter class="m-0.5">
                <CommentForm 
                    v-show="openedCommentId === comment.id"
                    :board-id="boardId" 
                    :parent-comment="comment" 
                />
            </CardFooter>
        </Card>   
        <div v-if="comment.all_children && comment.all_children.length" 
             :class="comment.depth === 0 ? 'ml-4 mt-2' : 'mt-2'">
            <Comments 
                v-if="openedReplyId"
                :comments="comment.all_children" 
                :parent-author="comment.author"
                :board-id="boardId" 
            />
        </div>
    </div>
</template>
<script setup>
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/Components/ui/card'
import CommentForm from './CommentForm.vue';
import Button from 'primevue/button';
import { ref } from 'vue';


const props = defineProps({
    comments: {
        type: Array
    },
    boardId:{
        type: Number
    },
    parentAuthor:{
        type: String
    }
});

const openedReplyId = ref(null);
const openedCommentId = ref(null);

const toggleCommentForm =(id) =>{
    openedCommentId.value = openedCommentId.value === id ? null : id;
}

const toggleReply =(id) => {
    openedReplyId.value = openedReplyId.value === id? null: id;
}
</script>
