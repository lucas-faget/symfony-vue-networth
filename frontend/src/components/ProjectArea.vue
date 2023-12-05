<script setup lang="ts">
    import ProfileCard from './ProfileCard.vue'
    import TagList from './TagList.vue'
    import { ProjectType } from '../types/ProjectType';
    import { getRandomImageUrl } from '../api/image';

    defineProps<{
        project: ProjectType
    }>();
</script>

<template>
    <div class="area project">
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
</template>

<style scoped>
    .project {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
