<script setup>
import { useForm, Link } from '@inertiajs/vue3';

const loginForm = useForm({
    email: '',
    password: ''
})

// 유효성 검사 함수
const validateForm = () => {
    let isValid = true;
    
    // 에러 초기화
    loginForm.clearErrors();
    
    if (!loginForm.email) {
        loginForm.setError('email', '이메일을 입력해주세요.');
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(loginForm.email)) {
        loginForm.setError('email', '올바른 이메일 형식이 아닙니다.');
        isValid = false;
    }
    
    if (!loginForm.password) {
        loginForm.setError('password', '비밀번호를 입력해주세요.');
        isValid = false;
    } else if (loginForm.password.length < 6) {
        loginForm.setError('password', '비밀번호는 6자 이상이어야 합니다.');
        isValid = false;
    }
    
    return isValid;
}

const onFormSubmit = () => {
    if (validateForm()) {
        loginForm.post('/auth/login');
    }
}
</script>

<template>
    <Panel header="로그인">
        <Form @submit="onFormSubmit" class="flex flex-col gap-4 w-full sm:w-56 mt-2">
            <div class="flex flex-col mt-3">
                <FloatLabel>
                    <label>이메일</label>
                    <InputText 
                        name="email" 
                        type="text" 
                        fluid 
                        v-model="loginForm.email"
                        :class="{ 'p-invalid': loginForm.errors.email }"
                    />
                    <Message 
                        v-if="loginForm.errors.email" 
                        severity="error" 
                        size="small" 
                        variant="simple"
                    >
                        {{ loginForm.errors.email }}
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
                        v-model="loginForm.password"
                        :class="{ 'p-invalid': loginForm.errors.password }"
                    />
                    <Message 
                        v-if="loginForm.errors.password" 
                        severity="error" 
                        size="small" 
                        variant="simple"
                    >
                        {{ loginForm.errors.password }}
                    </Message>
                </FloatLabel>
            </div>
            <div class="flex justify-between">
                <div class="items-center">
                    <Link :href="`/auth/register`">
                        회원가입
                    </Link>
                </div>
                <Button 
                    type="submit" 
                    severity="secondary" 
                    label="Submit" 
                    :loading="loginForm.processing"
                />    
            </div>
        </Form>
    </Panel>    
</template>