<script setup>
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import SettingMenu from './Partials/SettingMenu.vue';
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';

const props = defineProps({
    topmenus: {
        type: Object
    }
})

</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <div class="card w-full">
                <Tabs value="0">
                    <TabList>
                        <Tab value="0">Menu 관리</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel value="0">
                            <SettingMenu :topmenus="topmenus"/>
                        </TabPanel>
                    </TabPanels>
                </Tabs>
                
            </div>
        </GContentPanel>
    </BoardLayout>
</template>