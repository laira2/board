<template >
    <div class="card items-center">
        <DataTable :value="boards" tableStyle="min-width: 50rem">
            <Column v-for="board of columns" :key="board.field" :field="board.field" :header="board.header"></Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const boards = defineProps({
    data: {
        type: Array,
        required:true
    }
});

console.log('boards data: ', boards);   

const columns = [
    { field: 'id', header: 'ID' },
    { field: 'title', header: '제목' },
    { field: 'author', header: '작성자' },
    { field: 'updated_at', header: '수정일' }
];
</script>
