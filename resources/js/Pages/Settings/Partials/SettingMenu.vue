<script setup>

import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import MenuForm from './MenuForm.vue';


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
                    <MenuForm :menus="menus "/>
                    
                </TabPanel>

            </TabPanels>
        </Tabs>
    </div>
</template>

