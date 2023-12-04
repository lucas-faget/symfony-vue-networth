<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import PostListArea from '../components/PostListArea.vue'
    import { fetchUser, fetchAllUsers, fetchUserPosts } from '../api/api'

    const user = ref({});
    const users = ref([]);
    const posts = ref([]);

    onMounted(async () => {
        user.value = await fetchUser('1');
        users.value = await fetchAllUsers();
        posts.value = await fetchUserPosts('1');
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-1">
            <div>
                <ProfileArea :user="user"/>
            </div>
            <div>
                <PostListArea title="My posts" :posts="posts" />
            </div>
            <div>
                <ProfileListArea title="Suggested profiles" :users="users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
