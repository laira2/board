<template>
    <BoardLayout>
        <GContentPanel>
            <div class="card flex justify-center w-auto">
                
                <Form v-slot="$form" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full ">
                    <div class="flex flex-col gap-1 flex-row">
                        <label name="title" value="title" class="w-20 flex items-center">제목</label>
                        <InputText v-model="form.title" name="title" type="text" placeholder="title" fluid />   
                    </div>
                    <div class="flex flex-col gap-1 flex-row">
                        <label name="author" value="author" class="w-20 flex items-center">작성자</label>
                        <InputText :disabled="isAuthor" v-model="form.author" name="author" type="text" placeholder="author" fluid />
                        
                    </div>
                    <div class="flex flex-col gap-1  ">
                        <label name="content" value="content" class="w-20 flex items-baseline">내용</label>
                        <Textarea v-model="form.content" name="content" type="text" placeholder="content" fluid rows="10" cols="30" />
                        <!-- TODO: Editor 연결 -->
<!--                         
                        <Editor v-model="form.content" editorStyle="height: 320px">
                            <template v-slot:toolbar>
                                <span class="ql-formats">
                                    <button v-tooltip.bottom="'Bold'" class="ql-bold"></button>
                                    <button v-tooltip.bottom="'Italic'" class="ql-italic"></button>
                                    <button v-tooltip.bottom="'Underline'" class="ql-underline"></button>
                                </span>
                            </template>
                        </Editor> -->                    
                    </div>
                    <Button type="submit" severity="secondary" label="등록"/>
                </Form>
            </div>
        </GContentPanel>
    </BoardLayout>
</template>

<script setup>
import { onMounted, ref, toRaw } from 'vue';
import Textarea from 'primevue/textarea';
import { useForm } from '@inertiajs/vue3';
// import Toast from 'primevue/toast';

// const toast = useToast();
const props = defineProps({
    board : {
        type: Array,
    }
})

const form = useForm({
    title: '',
    author: '',
    content: ''
});

const isAuthor = ref(false)

onMounted(()=>{
    if (props.board) {
        form.title = props.board.title
        form.author = props.board.author
        form.content = props.board.content
        isAuthor.value = true
    }
})

const onFormSubmit = () => {
    if(props.board){
        console.log("form.put 실행");
        form.put(`/board/${props.board.id}`);
    }else{
        form.post('/board/post', {
                onSuccess: () => {
                }
            });
    };
    
}

</script>
