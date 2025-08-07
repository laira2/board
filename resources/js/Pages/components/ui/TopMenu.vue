<template>
    <div>
        <nav class="flex space-x-4  justify-between">
            <div>
                <Link
                    v-for="menu in menus"
                    :key="menu.url"
                    :href="`/menu/${menu.url}`"
                    class="text-sm text-gray-950 hover:underline px-3 py-2 rounded hover:bg-gray-100"
                >
                    {{ menu.name }}
                </Link>
            </div>
            <div>
                <Link href="/auth/login">
                    Login
                </Link>
            </div>
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