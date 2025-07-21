<script setup>

import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import MenuForm from './MenuForm.vue';
const props = defineProps({
    menus:{
        type: Object
    }
})

</script>

<template>
    <div class="card w-full">
        <Tabs value="0">
            <TabList>
                <Tab value="0">Menu 관리</Tab>
                <Tab value="1">Header II</Tab>
                <Tab value="2">Header III</Tab>
            </TabList>
            <TabPanels>
                <TabPanel value="0">
                    <div>
                        <DataTable :value="menus" tableStyle="min-width: 50rem">
                            <Column field="id" header="Id" style="width: 15%"></Column>
                            <Column field="code" header="Code" style="width: 25%"></Column>
                            <Column field="name" header="Name" style="width: 25%"></Column>
                            <Column field="decription" header="Decription" style="width: 35%"></Column>
                        </DataTable>
                    </div>
    
                    <MenuForm/>
                    
                </TabPanel>

            </TabPanels>
        </Tabs>
    </div>
</template>

