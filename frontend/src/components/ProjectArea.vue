<script setup lang="ts">
    import PostHead from './PostHead.vue'
    import ProfileCard from './ProfileCard.vue'
    import TagList from './TagList.vue'
    import { ProjectType } from '../types/ProjectType';
    import { getRandomImageUrl } from '../api/image';

    defineProps<{
        project: ProjectType
    }>();
</script>

<template>
    <div class="area">
        <PostHead type="Project" date="3 days ago" />
        <div class="content">
            <ProfileCard
                v-if="project.creator"
                :key="project.creator.id"
                :user="project.creator"
            />
            <div class="text-dark text-large text-bold">
                {{ project.title }}
            </div>
            <div class="text-dark">
                {{ project.description }}
            </div>
            <TagList v-if="project.tags" :tags="project.tags"/>
            <img :src="getRandomImageUrl()" alt="project_image" />
        </div>
    </div>
</template>

<style scoped>
    .content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
