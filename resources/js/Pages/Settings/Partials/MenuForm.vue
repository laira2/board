<template>
    <div>
        <Form v-slot="$menuForm" @submit="onFormSubmit" class=" mt-3">
            <div class="flex">
                <label name="code" value="code" class="w-11 flex items-center text-center pr-0 mr-0">코드</label>
                <InputText type="text" v-model="menuForm.code" placeholder="code" class="ml-0 mr-2" style="width: 20%"/>
                <label name="name" value="name" class="w-11 flex items-center">이름</label>
                <InputText type="text" v-model="menuForm.name" class="ml-0 mr-2" style="width: 20%"/>
                <label name="description" value="description" class="w-11 flex items-center">설명</label>
                <InputText type="text" v-model="menuForm.description" class="ml-0 mr-2" style="width: 35%"/>
                <label name="url" value="url" class="w-11 flex items-center">URL</label>
                <InputText type="text" v-model="menuForm.url" class="ml-0 mr-2" style="width: 25%"/>  
            </div>
            <div class="flex justify-end mt-3">
                <Button type="submit" label="등록" class="w-20 m-1" />
                <div v-if="props.menu!=null" class>                    
                    <Link :href="`/menu/delete/${menu.id}`" method="delete" as="button"  >
                        <Button type="button" label="Danger" :disabled="isCustomMenu(menu.name)" severity="danger" class="w-20 m-1" >삭제</Button>
                    </Link>
                    <Checkbox class="w-20 m-1 items-center" :disabled="isCustomMenu(menu.name)" v-model="menuForm.is_activate" binary />
                </div>  
            </div>       
        </Form> 
    </div>
    
</template>
<script setup>
import { useForm,Link } from '@inertiajs/vue3';
import Checkbox from 'primevue/checkbox';

const props = defineProps({
    menu:{
        type: Object,
    }
})

const isCustomMenu = (name) => {
    return ['home', 'Post', 'settings'].includes(name);
}

const menuForm = useForm({
    code:'',
    name:'',
    description:'',
    url: '',
    is_activate: false
});

if(props.menu!=null){
    menuForm.code = props.menu.code
    menuForm.name = props.menu.name
    menuForm.description = props.menu.description
    menuForm.url = props.menu.url
    if (props.menu.is_activate== true){
        menuForm.is_activate = props.menu.is_activate === true;
    } 

}
const onFormSubmit = ()=>{
    if(props.menu!=null){
        menuForm.put(`/menu/${props.menu.id}`);
    }else{
        menuForm.post('/menu/post');
    }   

}
</script>