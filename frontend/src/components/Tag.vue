<script setup lang="ts">
defineProps<{
    text: string;
}>();
</script>

<template>
    <div class="tag">
        <span class="text-small">{{ text }}</span>
    </div>
</template>

<style scoped>
.tag {
    background: hsl(240, 100%, 75%);
    color: #fff;
    padding: 5px 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
}
</style>
