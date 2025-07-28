<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    formtype:{
        type: String
    }
})
console.log("formtype",props.formtype);
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
            <label value="검색" />
            <InputText placeholder="Search" type="text" class="w-32 sm:w-auto" v-model="searchForm.search_key"/>
            <Button type="submit" icon="pi pi-search" iconPos="top" />
        </Form>
    </div>
</template>
