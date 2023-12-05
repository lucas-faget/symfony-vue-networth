<script setup lang="ts">
    import Button from './Button.vue'

    defineProps<{
        title: string
    }>();
</script>

<template>
    <div class="area">
        <Button :text="title" />
    </div>
</template>

<style scoped>

</style>
