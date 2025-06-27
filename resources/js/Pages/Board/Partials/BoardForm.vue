<template>
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
            <div class="flex flex-col gap-1 flex-row">
                <label name="title" value="title" class="w-20 flex items-baseline">제목</label>
                <Textarea v-model="form.content" name="content" type="text" placeholder="content" fluid rows="5" cols="30" />
            </div>
            <Button type="submit" severity="secondary" label="Submit" />
        </Form>
    </div>
</template>

<script setup>
import { reactive, toRaw } from 'vue';
import { useToast } from 'primevue/usetoast';
import Textarea from 'primevue/textarea';
// import Toast from 'primevue/toast';

// const toast = useToast();

const form = reactive({
    title: '',
    author: '',
    content: '',
});

const onFormSubmit = async() => {
    try{
        const response = await axios.post('/api/board', toRaw(form));
        console.log('submitted:', response.data);
    }catch(error){
        console.log('submit fail',error);
    }finally{
        // toast.add({ 
        //     severity: 'success',
        //     summary: 'Form is submitted.',
        //     life: 3000
        // });
    }
    
};
</script>
