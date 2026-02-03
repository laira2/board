<template>
    <div class="card">
        <Panel legend="BOARD"  header="BOARD" toggleable >
            <TopMenu />
        </Panel> 
        
        <GContentPanel/>
        <Footer />
    </div>
</template>

<script setup>
import { Panel } from "primevue";
import { ref } from "vue";
import TopMenu from "../components/ui/TopMenu.vue";
import Footer from "../components/ui/Footer.vue";
import BoardForm from "../Board/Partials/BoardForm.vue";
import GContentPanel from "../components/GContentPanel.vue";

</script>