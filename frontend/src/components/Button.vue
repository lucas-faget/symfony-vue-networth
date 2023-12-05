<script setup lang="ts">
    defineProps<{
        text: string
    }>();
</script>

<template>
    <div class="button">
        {{ text }}
    </div>
</template>

<style scoped>
    .button {
        background: var(--color-gray-20);
        color: var(--color-gray-100);
        width: fit-content;
        padding: 5px 15px;
        display: flex;
        align-items: center;
        text-transform: uppercase;
        border: 2px solid var(--color-gray-20);
        border-radius: 20px;
    }
</style>
