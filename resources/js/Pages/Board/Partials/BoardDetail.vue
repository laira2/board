<template>
    <Card style="overflow: hidden" class="">
        <template #header>
        </template>
        <template #title>
            <div class="flex justify-between m-4">
                <h1>{{ board.title}}</h1>
                
            </div>
            </template> 
        <template #subtitle>
            <div class="flex justify-between mr-4 ml-4">
                <p>
                    작성자: {{ board.author }}
                </p>    
                <p>
                    작성일: {{ board.created_at }}
                </p>                
            </div>
            <div class="w-full h-px bg-gray-800 mr-3 ml-3"></div>
        </template>
        <template #content class="h ">
            
            <div class="h-100 m-4">
                <p class="m-0">{{ board.content }}</p>  
            </div>
            
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
  board: Array 
});
console.log("boardDetail board:", props);

</script>
