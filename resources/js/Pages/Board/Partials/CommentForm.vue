<template>
    <Form v-slot="$commentForm" :initialValues :resolver @submit="onFormSubmit" class="flex flex-col gap-4 w-full ">
        <div class="flex flex-col gap-1  ">
            <label name="comment" value="comment" class="w-20 flex items-baseline">내용</label>
            <Input name="comment" v-model="commentForm.comment" type="text" placeholder="comment" fluid rows="10" cols="30" />         
        </div>
        <Button type="submit" severity="secondary" label="등록"/>
    </Form>
</template>

<script setup>
import {useForm, usePage } from '@inertiajs/vue3';
import Input from '@/Components/ui/input/Input.vue';

const props = defineProps({
    boardId:{
        type: Number
    },
    parentComment:{
        type: Object
    }
});

const page = usePage();

let commentForm;
if(props.parentComment==null){
    commentForm = useForm(
        {
            author: page.props.auth.user.name,
            comment:'',
            post_id: props.boardId
        }
    );
}else{
    commentForm = useForm(
        {
            author:page.props.auth.user.name,
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