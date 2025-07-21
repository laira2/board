<template>
    
    <div >
        <Form v-slot="$menuForm" @submit="onFormSubmit" class="flex mt-3" >
            <label name="code" value="code" class="w-20 flex items-center text-center pr-0 mr-0">코드</label>
            <InputText type="text" v-model="menuForm.code" placeholder="code" class="ml-0 mr-3.5" style="width: 20%"/>
            <label name="name" value="name" class="w-20 flex items-center">이름</label>
            <InputText type="text" v-model="menuForm.name" class="ml-0 mr-3.5" style="width: 25%"/>
            <label name="description" value="description" class="w-20 flex items-center">설명</label>
            <InputText type="text" v-model="menuForm.description" class="ml-0 mr-3.5" style="width: 35%"/>
            <label name="url" value="url" class="w-20 flex items-center">URL</label>
            <InputText type="text" v-model="menuForm.url" class="ml-0 mr-3.5" style="width: 10%"/>
            <Button type="submit" severity="secondary" label="등록" style="width: 10%" />
        </Form>        
    </div>
    
</template>
<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { useForm } from '@inertiajs/vue3';

const menuForm = useForm({
    code:'',
    name:'',
    description:'',
    url: ''
});

const onFormSubmit = ()=>{
    menuForm.post('/menu/post');

}
</script>