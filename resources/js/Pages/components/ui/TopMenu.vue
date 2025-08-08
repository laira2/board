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
                <Link v-if="!page.props.auth.user" href="/auth/login">
                    Login
                </Link>
                <div v-else>
                    <Popover>
                        <PopoverTrigger as-child >
                            <Button variant="ghost">
                                {{ page.props.auth.user.name }}
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent side="bottom"  class="w-30 right-0">
                            <Link :href="/auth/logout">
                                Logout
                            </Link>
                            <Link>
                                Profile
                            </Link>
                        </PopoverContent>
                    </Popover>
                    
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { Link, usePage, } from '@inertiajs/vue3';
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input"
import { Label } from "@/Components/ui/label"
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from "@/Components/ui/popover"

const props = defineProps({
    menus: {
        type: Object
    }
});
const page =usePage();

</script>