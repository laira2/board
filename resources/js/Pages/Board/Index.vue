
<template>
    <div class="card">
        <DataTable :value="products" tableStyle="min-width: 50rem">
            <Column v-for="col of columns" :key="col.field" :field="col.field" :header="col.header"></Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const boards = async() =>{
    const response = await axios.get("http://127.0.0.1:8000/api/board")
}

const products = ref();
const columns = [
    { field: 'title', header: '제목' },
    { field: 'author', header: '작성자' },
    { field: 'editDate', header: '마지막 수정일' }
];

</script>
