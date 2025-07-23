<template>
    <div>
        <nav class="flex space-x-4 ">
            <Link
                v-for="menu in menus"
                :key="menu.url"
                :href="`/menu/${menu.url}`"
                class="text-sm text-gray-700 hover:underline px-3 py-2 rounded hover:bg-gray-100"
            >
                {{ menu.name }}
            </Link>
            
        </nav>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
console.log("topmenu");
const props = defineProps({
    menus: {
        type: Object
    }
});
console.log(props.menus)
</script>