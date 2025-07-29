<template>
    <div class="card w-full">
        <div>
            <SearchForm formtype="menu" />
            <DataTable :value="topmenus.data" tableStyle="min-width: 50rem">
                <Column field="id" header="Id" style="width: 10%"></Column>
                <Column field="code" header="Code" style="width: 15%"></Column>
                <Column field="name" header="Name" style="width: 15%"></Column>
                <Column field="url" header="Url" style="width: 20%"></Column>
                <Column field="description" header="Decription" style="width: 35%"></Column>
                <Column  style="width: 15%">
                    <template #header>
                        <Button @click="visibleRegister = true" class="w-25" >
                            메뉴 등록
                        </Button>
                    </template> 
                    <template #body="slotProps">
                        <Button label="관리" @click="updateButton(slotProps.data)" severity="secondary" variant="text" class="w-15" />                                    
                    </template>
                </Column>
            </DataTable>
        </div>
        <div class="items-center">
            <Paginator 
                :rows="topmenus.per_page"
                :totalRecords="topmenus.total"
                :first="(topmenus.current_page - 1) * topmenus.per_page"
                @page="onPageChange">
                <template #start="slotProps">
                    Page: {{ topmenus.current_page }}
                </template>
            </Paginator>
        </div>
        <Drawer v-model:visible="visibleRegister" header="새 메뉴 등록" position="bottom" style="height: auto">
            <MenuForm />
        </Drawer>    
        <Drawer v-model:visible="visibleUpdate" header="메뉴 수정" position="bottom" style="height: auto">
            <MenuForm :menu="selectedMenu" />
        </Drawer> 
    </div>
</template>
<script setup>
import SearchForm from '@/Pages/components/ui/SearchForm.vue';
import { router } from '@inertiajs/vue3'
import MenuForm from './MenuForm.vue';
import Drawer from 'primevue/drawer';
import { ref } from "vue";

const props = defineProps({
    topmenus:{
        type: Object
    }
})

const visibleRegister = ref(false);
const visibleUpdate = ref(false);
const selectedMenu = ref(null);

const onPageChange = (event) =>{
    const page = event.page +1
    const per_page = event.rows
    router.get(`/?page=${page}&per_page=${per_page}`)
}

const updateButton = (menu) => 
{   
    selectedMenu.value = menu;
    visibleUpdate.value = true;
}

</script>
