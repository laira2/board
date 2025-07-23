<script setup>
import GContentPanel from '../components/GContentPanel.vue';
import BoardLayout from '../Layouts/BoardLayout.vue';
import SettingMenu from './Partials/SettingMenu.vue';

const props = defineProps({
    menus: {
        type: Object
    }
})

</script>

<template>
    <BoardLayout>
        <GContentPanel>
            <div class="flex m-0 p-0">
                <SettingMenu :menus="menus"/>
            </div>
        </GContentPanel>
    </BoardLayout>
</template>