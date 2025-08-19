<template>
    <div>
        <nav class="flex space-x-4  justify-between">
            <div>
                <Link
                    v-for="menu in menus"
                    :key="menu.url"
                    :href="`/${menu.url}`"
                    class="text-sm text-gray-950 hover:underline px-3 py-2 rounded hover:bg-gray-100"
                >
                    {{ menu.name }}
                </Link>
            </div>
            <div>
                <Link v-if="!page.props.auth.user" href="/auth/login">
                    Login
                </Link>
                <div v-else>
                    <Usermenu />
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { Link, usePage, } from '@inertiajs/vue3';
import Usermenu from './Usermenu.vue';

const props = defineProps({
    menus: {
        type: Object
    }
});
const page =usePage();

</script>