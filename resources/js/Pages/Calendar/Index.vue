<template>
    <BoardLayout>
        <GContentPanel>
            <Tabs value="0">
                    <TabList>
                        <Tab value="0">일정 관리</Tab>
                        <Tab value="1">내 일정</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel value="0">
                            <Calendar/>
                        </TabPanel>
                        <TabPanel value="1">
                            <MyEvent />
                        </TabPanel>
                    </TabPanels>
                </Tabs>    
            <div>
                
            </div>
        </GContentPanel>
    </BoardLayout>
    
</template>
<script setup>
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import Calendar from './Calendar.vue';
import MyEvent from './MyEvent.vue';

</script>