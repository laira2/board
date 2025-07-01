<template>
    <Card style="overflow: hidden">
        <template #header>
        <h3>{{ board.title }}</h3>  
        </template>
        <template #title>게시글 상세</template> 
        <template #subtitle>작성자: {{ board.author }}</template>
        <template #content>
            <p class="m-0">{{ board.content }}</p>  
        </template>
        <template #footer>
            <div class="flex gap-4 mt-1">
                <Button label="Cancel" severity="secondary" outlined class="w-full" />
                <Button label="Save" class="w-full" />
            </div>
        </template>
    </Card>
</template>

<script setup>

const props = defineProps({
  board: Object,
})

</script>
