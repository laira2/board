<template>
    <BoardLayout :menus="menus">
        <GContentPanel>
            <SearchForm formtype="board"/>
            <div class="w-full">
                <DataTable :value="boards.data" tableStyle="min-width: 50rem" >
                    <Column field="id" header="ID" style="width: 15%"></Column>
                    <Column field="title" header="Title" style="width: 40%">
                        <template #body="slotProps">
                            <Link  :href="`/board/${slotProps.data.id}`">
                                {{ slotProps.data.title }}
                            </Link>
                        </template>
                    </Column>
                    <Column field="updated_at" header="updatedAt" style="width: 15%"></Column>
                    <Column field="author" header="Author" style="width: 15%"></Column>                    
                </DataTable>
                <div class="items-center">
                    <Paginator 
                        :rows="boards.per_page"
                        :totalRecords="boards.total"
                        :first="(boards.current_page - 1) * boards.per_page"
                        @page="onPageChange">
                        <template #start="slotProps">
                            Page: {{ boards.current_page }}
                        </template>
                    </Paginator>
                </div>
            </div> 
        </GContentPanel>
    </BoardLayout>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import { Link, router } from '@inertiajs/vue3'
import Column from 'primevue/column';
import Paginator from 'primevue/paginator';
import BoardLayout from '../Layouts/BoardLayout.vue';
import GContentPanel from '../components/GContentPanel.vue';
import SearchForm from '../components/ui/SearchForm.vue';

const props = defineProps({
    boards: {
        type: Object
    },
    menus: {
        type: Object
    }
});

const onPageChange = (event) => {
    const page = event.page + 1
    const perPage = event.rows
    router.get(`/?page=${page}&per_page=${perPage}`)
}

</script>