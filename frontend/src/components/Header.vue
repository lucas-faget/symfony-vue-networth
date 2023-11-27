<script setup lang="ts">
    import { defineProps } from 'vue';
    
    defineProps<{
        text: string
    }>();
</script>

<template>
    <div class="header">
        {{ text }}
    </div>
</template>

<style scoped>
    .header {
        color: var(--color-gray-30);
        padding-bottom: 5px;
        display: flex;
        align-items: center;
        font-size: 16px;
        text-transform: uppercase;
        border-bottom: 1px solid var(--color-gray-30);
    }
</style>
