<template>
    <div class="flex">
        <Card style="overflow: hidden" class="w-full h-full m-0 p-0">
            <template #title>
                <div class="flex justify-between m-4 w-full">
                    <h1>{{ board.title}}</h1>
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
                <Divider />
            </template>
            <template #content class="h ">
                
                <div class="h-100 m-4">
                    <p class="m-0">{{ board.content }}</p>  
                </div>
                
            </template>
            <template #footer>
                <div class="flex justify-end gap-4 mt-1">
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

        <Card style="overflow: hidden" class="w-full  m-0 p-0">
            <template #title>
                <div class="flex justify-between m-4 w-full">
                    댓글
                </div>
                </template> 
            <template #subtitle>
            </template>
            <template #content class="h ">
                
                <div class="h-auto m-4">
                    댓글 card or table 들어갈 예정
                </div>                
            </template>
            <template #footer>
                <Form v-slot="$form" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full ">
                    <div class="flex flex-col gap-1 flex-row">
                        <label name="title" value="title" class="w-20 flex items-center">작성자</label>
                        <InputText :disabled="isAuthor"  name="author" type="text" placeholder="author" fluid />
                    </div>
                    <div class="flex flex-col gap-1  ">
                        <label name="title" value="title" class="w-20 flex items-baseline">댓글 내용</label>
                        <Input name="content" type="text" placeholder="content" fluid rows="10" cols="30" />         
                    </div>
                    <Button type="submit" severity="secondary" label="등록"/>
                </Form>
            </template>
        </Card>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, Text } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Input from '@/Components/ui/input/Input.vue';

const props = defineProps({
  board: Array 
});
const showComments = ref(false)

const toggleComments = () => {
  showComments.value = !showComments.value
}

</script>
