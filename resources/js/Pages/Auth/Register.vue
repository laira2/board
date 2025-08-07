<script setup>
import { useForm, Link } from '@inertiajs/vue3';

const registerForm = useForm({
    email: '',
    name: '',
    password: ''
})

const validateForm = () => {
    let isValid = true;

    registerForm.clearErrors();
    
    if (!registerForm.email) {
        registerForm.setError('email', '이메일을 입력해주세요.');
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(registerForm.email)) {
        registerForm.setError('email', '올바른 이메일 형식이 아닙니다.');
        isValid = false;
    }
    
    if(!registerForm.name) {
        registerForm.setError('name','이름을 입력해주세요');
        isValid=false;
    }
    
    if (!registerForm.password) {
        registerForm.setError('password', '비밀번호를 입력해주세요.');
        isValid = false;
    } else if (registerForm.password.length < 6) {
        registerForm.setError('password', '비밀번호는 6자 이상이어야 합니다.');
        isValid = false;
    }
    
    return isValid;
}

const onFormSubmit = () => {
    if (validateForm()) {
        console.log("register post 실행")
        registerForm.post('/register');
    }
}
</script>

<template>
    <Panel header="회원 가입">
        <Form v-slot="$registerForm" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full sm:w-56 mt-2">
            <div class="flex flex-col mt-3">
                <FloatLabel>
                    <label>이메일</label>
                    <InputText 
                        name="email" 
                        type="text" 
                        fluid 
                        v-model="registerForm.email"
                        :class="{ 'p-invalid': registerForm.errors.email }"
                    />
                    <Message 
                        v-if="registerForm.errors.email" 
                        severity="error" 
                        size="small" 
                        variant="simple"
                    >
                        {{ registerForm.errors.email }}
                    </Message>
                </FloatLabel>
            </div>
            <div class="flex flex-col mt-3">
                <FloatLabel>
                    <label>이름</label>
                    <InputText 
                        name="name" 
                        type="text" 
                        fluid 
                        v-model="registerForm.name"
                        :class="{ 'p-invalid': registerForm.errors.name }"
                    />
                    <Message 
                        v-if="registerForm.errors.name" 
                        severity="error" 
                        size="small" 
                        variant="simple"
                    >
                        {{ registerForm.errors.name }}
                    </Message>
                </FloatLabel>
            </div>
            <div class="flex flex-col gap-1 mt-3">
                <FloatLabel>
                    <label>비밀번호</label>
                    <InputText 
                        name="password" 
                        type="password" 
                        fluid 
                        v-model="registerForm.password"
                        :class="{ 'p-invalid': registerForm.errors.password }"
                    />
                    <Message 
                        v-if="registerForm.errors.password" 
                        severity="error" 
                        size="small" 
                        variant="simple"
                    >
                        {{ registerForm.errors.password }}
                    </Message>
                </FloatLabel>   
            </div>
            <div class="flex justify-between">
                <div class="items-center">
                    <Link :href="`/auth/login`">
                        로그인
                    </Link>
                </div>
                <Button type="submit" severity="secondary" label="등록"/>
            </div>
        </Form>
    </Panel>    
</template>