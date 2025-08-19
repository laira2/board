<template>
    <div class="flex">
        <div :class="boardCardClass">
            <Card style="overflow: hidden" class="w-full h-full m-0 p-0">
                <template #title>
                    <div class="flex justify-between m-4 w-full">
                        <h1>{{ board.title}}</h1>
                        <div>
                            <Link :href="`/menu/board/post/${board.id}`">
                                <Button label="수정" class="w-15 mr-1.5" /> 
                            </Link>
                            <Link :href="`/board/delete/${board.id}`" method="delete" >
                                <Button label="삭제" severity="secondary" outlined class="w-15" /> 
                            </Link> 
                        </div>                    
                    </div>
                    </template> 
                <template #subtitle>
                    <div class="flex justify-between mr-4 ml-4">
                        <p>작성자: {{ board.author }}</p>    
                        <p>작성일: {{ board.created_at }}</p>                
                    </div>
                    <Divider />
                </template>
                <template #content class="h ">
                    <div class="h-100 m-4">
                        <p class="m-0">{{ board.content }}</p>  
                    </div>
                </template>
                <template #footer>                    
                    <div class="flex justify-end gap-4 mt-1">
                        <div v-show="showCalendar()">
                            <Link :href="`/calendar`" >
                                <Button label="일정 확인" severity="info" variant="outlined" />
                            </Link>
                        </div>
                        <div class="card flex ">
                            <div class="justify-center flex-wrap gap-4">
                                <Button type="button" label="댓글" variant="text" :badge="comments?.length || 0" @click="toggleComments" />
                            </div>
                            <Link :href="`/`" >
                                <Button label="목록" severity="secondary" outlined class="w-15 ml-1" /> 
                            </Link> 
                        </div>
                        
                    </div>
                </template>
            </Card>
        </div>
        <div v-if="showComments" class="w-1/3 overflow-y-auto">
            <BoardComment                 
                :comments="comments" :board="board"/>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import BoardComment from './BoardComment.vue';

const props = defineProps({
  board: {
        type: Object
    },
  comments: {
        type: Array
    },
}); 
console.log(props.board);
const showCalendar = () => {
  return !!props.board.calendar_id; 
};
const showComments = ref(false)

const toggleComments = () => {
  showComments.value = !showComments.value
}
const boardCardClass = computed(() => {
    return showComments.value 
        ? 'w-2/3 transition-all duration-300 ease-in-out' 
        : 'w-full transition-all duration-300 ease-in-out';
});

</script>
