<template>
    <div>
        <nav class="flex space-x-4 ">
            <Link
                v-for="menu in menus"
                :key="menu.url"
                :href="`/menu/${menu.url}`"
                class="text-sm text-gray-950 hover:underline px-3 py-2 rounded hover:bg-gray-100"
            >
                {{ menu.name }}
            </Link>
        </nav>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    menus: {
        type: Object
    }
});
</script>