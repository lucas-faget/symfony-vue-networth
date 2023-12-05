<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import Header from '../components/Header.vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import PostArea from '../components/PostArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser, fetchUserPosts, fetchSuggestedProfiles } from '../api/api'
    import { connectedUserId } from '../config';

    const user = ref({});
    const users = ref([]);
    const posts = ref([]);

    onMounted(async () => {
        user.value = await fetchUser(connectedUserId);
        users.value = await fetchSuggestedProfiles(connectedUserId);
        posts.value = await fetchUserPosts(connectedUserId);
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
