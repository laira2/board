<template>

            <Card style="overflow: hidden">
                <template #header>
                </template>
                <template #title>
                    <div class="flex justify-between m-4 w-full">
                        <h1>{{ board.title}}</h1>
                        <Button icon="pi pi-arrow-left" @click="visibleRight = true" />
                    </div>
                    </template> 
                <template #subtitle>
                    <div class="flex justify-between mr-4 ml-4">
                        <p>
                            작성자: {{ board.author }}
                        </p>    
                        <p>
                            작성일: {{ board.created_at }}
                        </p>                
                    </div>
                    <div class="w-full h-px bg-gray-800 mr-3 ml-3"></div>
                </template>
                <template #content class="h ">
                    
                    <div class="h-100 m-4">
                        <p class="m-0">{{ board.content }}</p>  
                    </div>
                    
                </template>
                <template #footer>
                    <div class="flex justify-end gap-4 mt-1">
                        <!-- TODO: create 재활용?? -->
                        <Link :href="`/board/post/${board.id}`">
                            <Button label="수정" class="w-15" /> 
                        </Link>
                        <Link :href="`/board/delete/${board.id}`" method="delete" >
                            <Button label="삭제" severity="secondary" outlined class="w-15" /> 
                        </Link> 
                        <Link :href="`/`" >
                            <Button label="목록" severity="secondary" outlined class="w-15" /> 
                        </Link> 
                    </div>
                </template>
            </Card>
            <Drawer v-model:visible="visibleRight" header="Right Drawer" position="right">
                <BoardComment/>
            </Drawer>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Avatar from 'primevue/avatar';
import BoardComment from './BoardComment.vue';

const props = defineProps({
  board: Array 
});
const visibleRight = ref(false);

</script>
