<template>
    <div>
        <DataTable :value="menus" tableStyle="min-width: 50rem">
            <Column field="id" header="Id" style="width: 15%"></Column>
            <Column field="code" header="Code" style="width: 25%"></Column>
            <Column field="name" header="Name" style="width: 25%"></Column>
            <Column field="decription" header="Decription" style="width: 35%"></Column>
        </DataTable>
    </div>
    
    <div >
        <Form v-slot="$menuForm" @submit="onFormSubmit" class="flex mt-3" >
            <label name="code" value="code" class="w-20 flex items-center text-center pr-0 mr-0">코드</label>
            <InputText type="text" v-model="menuForm.code" placeholder="code" class="ml-0 mr-3.5" style="width: 20%"/>
            <label name="name" value="name" class="w-20 flex items-center">이름</label>
            <InputText type="text" v-model="menuForm.name" class="ml-0 mr-3.5" style="width: 30%"/>
            <label name="description" value="description" class="w-20 flex items-center">설명</label>
            <InputText type="text" v-model="menuForm.description" class="ml-0 mr-3.5" style="width: 40%"/>
            <Button type="submit" severity="secondary" label="등록" style="width: 10%" />
        </Form>        
    </div>
    
</template>
<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
    menus:{
        type: Object
    }
});
const menuForm = useForm({
    code:'',
    name:'',
    description:''
});

const onFormSubmit = ()=>{
    menuForm.post('/menu/post');

}
</script>