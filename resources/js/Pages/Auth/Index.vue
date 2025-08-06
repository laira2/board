<template>
    <Card class="w-full h-full">
        <template #title>Board</template>
        <template #content>
            <div class="card flex justify-center">
                <LoginForm />
            </div>
        </template>
    </Card>
</template>

<script setup>
import LoginForm from './LoginForm.vue';


</script>
