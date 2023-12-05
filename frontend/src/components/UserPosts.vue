<script setup lang="ts">
    import { ref, watch, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import PostArea from '../components/PostArea.vue'
    import { fetchUserPosts } from '../api/api'
    import { connectedUserId } from '../config';

    const route = useRoute();
    const posts = ref([]);

    watch(() => route.params.id,
        async newId => {
            posts.value = await fetchUserPosts(newId as string ?? connectedUserId);
        }
    )

    onMounted(async () => {
        posts.value = await fetchUserPosts(route.params.id as string ?? connectedUserId);
    });
</script>

<template>
    <div class="posts">
        <PostArea
            v-for="post in posts"
            :key="post.id"
            :post="post"
        />
    </div>
</template>

<style scoped>
    .posts {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
