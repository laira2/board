<template>
    <div class="card w-full">
        <Tabs value="0">
            <TabList>
                <Tab value="0">Menu 관리</Tab>
            </TabList>
            <TabPanels>
                <TabPanel value="0">
                    <div>
                        <DataTable :value="topmenus" tableStyle="min-width: 50rem">
                            <Column field="id" header="Id" style="width: 10%"></Column>
                            <Column field="code" header="Code" style="width: 20%"></Column>
                            <Column field="name" header="Name" style="width: 20%"></Column>
                            <Column field="url" header="url" style="width: 20%"></Column>
                            <Column field="description" header="Decription" style="width: 35%"></Column>
                            <Column  style="width: 15%">
                                <template #header>
                                    <Button  @click="visibleRegister = true" >
                                        메뉴 등록
                                    </Button>
                                </template> 
                                <template #body="slotProps">
                                    <Button label="관리" @click="updateButton(slotProps.data)" severity="secondary" variant="text" class="w-15" />                                    
                                </template>
                            </Column>
                        </DataTable>
                    </div>
                    <Drawer v-model:visible="visibleRegister" header="새 메뉴 등록" position="bottom" style="height: auto">
                        <MenuForm/>
                    </Drawer>    
                    <Drawer v-model:visible="visibleUpdate" header="메뉴 수정" position="bottom" style="height: auto">
                        <MenuForm :menu="selectedMenu" />
                        
                    </Drawer> 
                                       
                </TabPanel>
            </TabPanels>
        </Tabs>
    </div>
</template>
<script setup>
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import MenuForm from './MenuForm.vue';
import Drawer from 'primevue/drawer';
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    topmenus:{
        type: Object
    }
})
console.log(props.topmenus);
const visibleRegister = ref(false);
const visibleUpdate = ref(false);
const selectedMenu = ref(null);

const updateButton = (menu) => 
{
    selectedMenu.value = menu;
    visibleUpdate.value = true;
}

</script>
