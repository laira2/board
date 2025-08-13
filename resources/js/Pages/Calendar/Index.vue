<template>
    <BoardLayout>
        <GContentPanel>
            <div>
                <Calendar/>
            </div>
        </GContentPanel>
    </BoardLayout>
    
</template>
<script setup>
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import Calendar from './Calendar.vue';

</script>