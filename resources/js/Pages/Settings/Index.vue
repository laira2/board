<script setup>
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import SettingMenu from './Partials/SettingMenu.vue';


</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <div class="flex m-0 p-0">
                <SettingMenu/>
            </div>
        </GContentPanel>
    </BoardLayout>
</template>