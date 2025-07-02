<template >
    <BoardLayout>
        <GContentPanel>
            <div class="card items-center">
                <DataTable :value="boards" tableStyle="min-width: 50rem">
                    <Column v-for="board of columns" :key="board.field" :field="board.field" :header="board.header">
                        <template #body="slotProps">
                            <Link
                                v-if="board.field === 'title'"
                                :href="`/board/${slotProps.data.id}`"
                                class="text-blue-600 hover:underline"
                            >
                                {{ slotProps.data[board.field] }}
                            </Link>
                            <!-- <a v-if="board.field === 'title'" :href="`/board/${slotProps.data.id}`" class="text-blue-600 hover:underline">
                                {{ slotProps.data[board.field] }}
                            </a> -->
                            <span v-else>
                                {{ slotProps.data[board.field] }}
                            </span>
                        </template>
                    </Column>
                </DataTable>
            </div>  
        </GContentPanel>
    </BoardLayout>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import { Link } from '@inertiajs/vue3'
import Column from 'primevue/column';
import BoardLayout from '../Layouts/BoardLayout.vue';
import GContentPanel from '../components/GContentPanel.vue';

const props = defineProps({
    boards: {
        type: Array
    }
});
const columns = [
    { field: 'id', header: 'ID' },
    { field: 'title', header: '제목' },
    { field: 'author', header: '작성자' },
    { field: 'updated_at', header: '수정일' }
];
</script>