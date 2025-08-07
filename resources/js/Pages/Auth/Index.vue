<template>
    <Card class="w-full h-full">
        <template #title>Board</template>
        <template #content>
            <div v-if="is_login==='true'" class="card flex justify-center">
                <LoginForm  />
            </div>
            <div v-if="is_login==='false'" class="card flex justify-center">
                <Register  />
            </div>
        </template>
    </Card>
</template>

<script setup>
import LoginForm from './LoginForm.vue';
import Register from './Register.vue';

const props = defineProps({
    is_login : {
        type: Boolean
    }
})
</script>
