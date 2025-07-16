<template>
    <Form v-slot="$commentForm" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full ">
        <div class="flex flex-col gap-1 flex-row">
            <label name="author" value="author" class="w-20 flex items-center">작성자</label>
            <InputText v-model="commentForm.author" name="author" type="text" placeholder="author" fluid />
        </div>
        <div class="flex flex-col gap-1  ">
            <label name="comment" value="comment" class="w-20 flex items-baseline">내용</label>
            <Input name="comment" v-model="commentForm.comment" type="text" placeholder="comment" fluid rows="10" cols="30" />         
        </div>
        <Button type="submit" severity="secondary" label="등록"/>
    </Form>
</template>

<script setup>
import {useForm } from '@inertiajs/vue3';
import Input from '@/Components/ui/input/Input.vue';

const props = defineProps({
    boardId:{
        type: Number
    },
    parentComment:{
        type: Object
    }
});

let commentForm;
if(props.parentComment==null){
    commentForm = useForm(
        {
            author:'',
            comment:'',
            post_id: props.boardId
        }
    );
}else{
    commentForm = useForm(
        {
            author:'',
            comment:'',
            post_id: props.boardId,
            parent_id: props.parentComment.id,
            depth: props.parentComment.depth + 1
        }
    );
}

const onFormSubmit = () => {
    console.log(commentForm);
    commentForm.post('/comment/post',{
        onSuccess: () => {

        }
    })
}
</script>