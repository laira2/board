<script setup>
import { ref } from 'vue';
import TopMenu from '../../ui/components/TopMenu.vue';
import PageName from '../../ui/components/PageName.vue';

const title = ref('');
title.value = 'Settings';
</script>

<template>
    <TopMenu/>
    <PageName :title="title"/>
</template>