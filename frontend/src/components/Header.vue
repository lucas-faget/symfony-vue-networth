<script setup lang="ts">
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
        background: var(--color-gray-20);
        color: var(--color-gray-100);
        width: fit-content;
        padding: 5px 15px;
        display: flex;
        align-items: center;
        font-size: 16px;
        text-transform: uppercase;
        border: 2px solid var(--color-gray-20);
        border-radius: 20px;
    }
</style>
