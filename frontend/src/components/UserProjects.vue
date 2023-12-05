<script setup lang="ts">
    import { ref, watch, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import ProjectArea from '../components/ProjectArea.vue'
    import { fetchUserProjects } from '../api/api'
    import { connectedUserId } from '../config';

    const route = useRoute();
    const projects = ref([]);

    watch(() => route.params.id,
        async newId => {
            projects.value = await fetchUserProjects(newId as string ?? connectedUserId);
        }
    )

    onMounted(async () => {
        projects.value = await fetchUserProjects(route.params.id as string ?? connectedUserId);
    });
</script>

<template>
    <div class="projects">
        <ProjectArea
            v-for="project in projects"
            :key="project.id"
            :project="project"
        />
    </div>
</template>

<style scoped>
    .projects {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
