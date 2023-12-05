<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import Header from '../components/Header.vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import PostArea from '../components/PostArea.vue'
    import ProjectArea from '../components/ProjectArea.vue'
    import { fetchUser, fetchSuggestedProfiles, fetchUserPosts, fetchUserProjects } from '../api/api'
    import { connectedUserId } from '../config';

    const user = ref({});
    const users = ref([]);
    const posts = ref([]);
    const projects = ref([]);

    onMounted(async () => {
        user.value = await fetchUser(connectedUserId);
        users.value = await fetchSuggestedProfiles(connectedUserId);
        posts.value = await fetchUserPosts(connectedUserId);
        projects.value = await fetchUserProjects(connectedUserId);
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-1">
            <div class="col">
                <ProfileArea :user="user"/>
            </div>
            <div class="col">
                <Header title="My posts" />
                <PostArea
                    v-for="post in posts"
                    :key="post.id"
                    :post="post"
                />
                <Header title="My projects" />
                <ProjectArea
                    v-for="project in projects"
                    :key="project.id"
                    :project="project"
                />
            </div>
            <div class="col">
                <Header title="Suggested profiles" />
                <ProfileListArea :users="users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
