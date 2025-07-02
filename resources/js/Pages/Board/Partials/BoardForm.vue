<template>
    <BoardLayout>
        <GContentPanel>
            <div class="card flex justify-center w-auto">
                <!-- <Toast /> -->
                
                <Form v-slot="$form" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full ">
                    <div class="flex flex-col gap-1 flex-row">
                        <label name="title" value="title" class="w-20 flex items-center">제목</label>
                        <InputText v-model="form.title" name="title" type="text" placeholder="title" fluid />
                    </div>
                    <div class="flex flex-col gap-1 flex-row">
                        <label name="title" value="title" class="w-20 flex items-center">작성자</label>
                        <InputText v-model="form.author" name="author" type="text" placeholder="author" fluid />
                    </div>
                    <div class="flex flex-col gap-1  ">
                        <label name="title" value="title" class="w-20 flex items-baseline">내용</label>
                        <Textarea v-model="form.content" name="content" type="text" placeholder="content" fluid rows="10" cols="30" />
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
import { reactive, toRaw } from 'vue';
import { useToast } from 'primevue/usetoast';
import Textarea from 'primevue/textarea';
import { useForm } from '@inertiajs/vue3'
// import Toast from 'primevue/toast';

// const toast = useToast();

const form = useForm({
    title: '',
    author: '',
    content: ''
});
const onFormSubmit = () => {
    form.post('/board/post', {
        onSuccess: () => {
            // 성공 시 자동 리다이렉트
        }
    });
}
// const onFormSubmit = async() => {
//     try{
        // const response = await axios.post('/board/post', toRaw(form));
        // console.log('submitted:', response.data);

        // if(response.data.success){
        //     window.location.href = '/';
        // }
//     }catch(error){
//         console.log('submit fail',error);
//     }
    
// };
</script>
