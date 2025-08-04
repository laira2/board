<template>
    <Card class="w-full h-full">
        <template #title>Board</template>
        <template #content>
            <div class="card flex justify-center">
                <Form v-slot="$form" :resolver="resolver" :initialValues="initialValues" @submit="onFormSubmit" class="flex flex-col gap-4 w-full sm:w-56">
                    <div class="flex flex-col gap-1">
                        <InputText name="username" type="text" placeholder="Username" fluid />
                        <Message v-if="$form.username?.invalid" severity="error" size="small" variant="simple">{{ $form.username.error?.message }}</Message>
                    </div>
                    <div class="flex flex-col gap-1">
                        <InputText name="email" type="text" placeholder="Email" fluid />
                        <Message v-if="$form.email?.invalid" severity="error" size="small" variant="simple">{{ $form.email.error?.message }}</Message>
                    </div>
                    <div>
                        <div>
                            <Link :href="`/auth/register`">
                                
                            </Link>
                        </div>
                        <Button type="submit" severity="secondary" label="Submit" />    
                    </div>
                    
                </Form>
            </div>
        </template>
    </Card>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3';

const loginForm = useForm({
    email:'',
    password:''
})
</script>
