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
                            <div class="grid gap-4">
                                <div class="grid gap-2">
                                    <div class="grid grid-cols-3 items-center gap-4">
                                        <!-- TODO: 사용자 정보 수정 페이지 추가 -->
                                        <Link>
                                            Profile
                                        </Link>
                                    </div>
                                    <div class="grid grid-cols-3 items-center gap-4">
                                        <Button variant="link" class="ml-2" @click="logout">
                                            Logout
                                        </Button>
                                    </div>  
                                </div>
                            </div>                           
                        </PopoverContent>
                    </Popover>                    
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { Link, usePage, router } from '@inertiajs/vue3';
import { Button } from "@/Components/ui/button";
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

const logout = () => {
    router.post('/auth/logout', {}, {
        onError: (errors) => {
            console.error('Logout 실패:', errors)
        },
        onSuccess: () => {
            console.log('Logout 성공')
        }
    })
}
</script>