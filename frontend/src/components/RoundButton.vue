<script setup lang="ts">
defineProps({
    text: String,
    isFilled: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div class="button" :class="isFilled ? 'filled-color' : 'color'">
        {{ text }}
    </div>
</template>

<style scoped>
.button {
    background: inherit;
    color: var(--color-gray-100);
    width: fit-content;
    padding: 5px 15px;
    display: flex;
    align-items: center;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 20px;
}

.color {
    color: var(--color-gray-20);
    background: var(--color-gray-100);
    border: 2px solid var(--color-gray-20);
}

.filled-color {
    color: var(--color-gray-100);
    background: var(--color-gray-20);
    border: 2px solid var(--color-gray-20);
}
</style>
