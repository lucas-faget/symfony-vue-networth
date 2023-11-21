<script setup lang="ts">
    import { defineProps } from 'vue';
    
    defineProps<{
        text: string
    }>();
</script>

<template>
    <div class="header">
        <div class="head">{{ text }}</div>
        <div class="line"></div>
    </div>
</template>

<style scoped>
    .header {
        display: flex;
    }

    .head {
        background: var(--color-gray-40);
        color: var(--color-gray-100);
        height: 30px;
        padding-inline: 10px;
        display: flex;
        align-items: center;
        font-size: 14px;
        text-transform: uppercase;
    }

    .line {
        flex: 1;
        border-bottom: 2px solid var(--color-gray-40);
    }
</style>
