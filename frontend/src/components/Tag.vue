<script setup lang="ts">
    import { defineProps } from 'vue';
    
    defineProps<{
        text: string
    }>()
</script>

<template>
    <div class="tag">
        <span>{{ text }}</span>
    </div>
</template>

<style scoped>
    .tag {
        background: hsl(240,100%,75%);
        color: #fff;
        height: 25px;
        padding-inline: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 13px;
        border-radius: 15px;
    }
</style>
