<template>
    <div class="card">
        <Panel legend="BOARD"  header="BOARD" toggleable >
            <TopMenu />
        </Panel> 
        <slot>
            <!-- content 영역 -->
        </slot>
        <Footer />
    </div>
</template>

<script setup>
import { Panel } from "primevue";
import TopMenu from "../components/ui/TopMenu.vue";
import Footer from "../components/ui/Footer.vue";

</script>