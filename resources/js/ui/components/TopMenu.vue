<!-- <template>
    <div class="grid grid-cols-12">
        <a href="/">Board</a>
        <a href="/settings">Settings</a>
    </div>
</template> -->

<template>
    <div class="card">
            <!-- 상단 메뉴바 -->
            <Menubar :model="items">
                <template #item="{ item, props, hasSubmenu, root }">
                    <a v-ripple :href="item.url" class="flex items-center" v-bind="props.action">
                        <span>{{ item.label }}</span>
                        <Badge v-if="item.badge" :class="{ 'ml-auto': !root, 'ml-2': root }" :value="item.badge" />
                        <span v-if="item.shortcut" class="ml-auto border border-surface rounded bg-emphasis text-muted-color text-xs p-1">{{ item.shortcut }}</span>
                        <i v-if="hasSubmenu" :class="['pi pi-angle-down ml-auto', { 'pi-angle-down': root, 'pi-angle-right': !root }]"></i>
                    </a>
                </template>                
            </Menubar>      
    </div>
</template>

<script setup>
import { ref } from "vue";
const Title = ref("Baord");

const items = ref([
    {
        label: 'Home',
        url: '/',
    },
    {
        label: 'User',
        url: '/',
    },
    {
        label: 'Settings',
        icon: 'pi pi-search',
        items: [
            {
                label: 'Components',
                icon: 'pi pi-bolt'
            },
            {
                label: 'Blocks',
                icon: 'pi pi-server'
            },
            {
                label: 'UI Kit',
                icon: 'pi pi-pencil'
            },
        ]
    },
]);
</script>