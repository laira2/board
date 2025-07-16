<template>
    <div v-for="comment in comments" :key="comment.id">
        <Card :class="comment.depth > 0 ? 'mt-2 ml-4' : ''">
            <CardHeader>
                <div class="flex justify-between">
                    <CardTitle>{{ comment.author }}</CardTitle>   
                    <CardDescription>{{ comment.updated_at }}</CardDescription>
                </div>
            </CardHeader>
            <CardContent>
                <p v-if="comment.depth != 0" class="text-stone-500">@{{ parentAuthor }}</p>
                {{ comment.comment }} 
            </CardContent>
            
            <div class="ml-2 mt-2 p-1">
                <Button @click="toggleReply(comment.id)" label="댓글쓰기" severity="secondary"></Button>
                <CommentForm 
                    v-show="openedReplyId === comment.id"
                    :board-id="boardId" 
                    :parent-comment="comment" 
                />
            </div>
        </Card>   
        <div v-if="comment.all_children && comment.all_children.length" 
             :class="comment.depth === 0 ? 'ml-4 mt-2' : 'mt-2'">
            <Comments 
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

const toggleReply =(id) =>{
    openedReplyId.value = openedReplyId.value === id ? null : id;
}
</script>
