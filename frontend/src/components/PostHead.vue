<script setup lang="ts">
defineProps<{
    type: string;
    date: string;
}>();
</script>

<template>
    <div class="head">
        <div style="display: flex; justify-content: space-between">
            <span class="text-gray text-small">{{ type }}</span>
            <span class="text-gray text-small">{{ date }}</span>
        </div>
        <div class="horizontal-line"></div>
    </div>
</template>

<style scoped>
.head {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 10px;
}
</style>
