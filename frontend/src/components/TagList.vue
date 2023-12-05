<script setup lang="ts">
    import Tag from './Tag.vue'
    import { TagType } from '../types/TagType'

    defineProps<{
        tags: TagType[]
    }>();
</script>

<template>
    <div class="tags">
        <Tag
            v-for="tag in tags"
            :key="tag.id"
            :text="tag.name"
        />
    </div>
</template>

<style scoped>
    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
</style>
