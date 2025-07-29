<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    formtype:{
        type: String
    }
})
console.log("formtype : ",props.formtype);
const searchForm = useForm({
    search_key:'',
})
const onFormSubmit= ( )=>{
    searchForm.get(`/${props.formtype}/search`, {
        search_key: searchForm.search_key
    })
}
</script>
   
<template>
    <div class="flex items-end gap-2">
        <Form v-slot="$searchForm" @submit="onFormSubmit" class=" mt-3">
            <FloatLabel variant="on">
                <InputText id="search_key" v-model="searchForm.search_key" class="mr-1" />
                <label for="search_key">검색</label>
                <Button type="submit" icon="pi pi-search" iconPos="top" />
            </FloatLabel>            
        </Form>
    </div>
</template>
