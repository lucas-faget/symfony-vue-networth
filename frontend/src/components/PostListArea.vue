<script setup lang="ts">
    import Header from './Header.vue'
    import PostCard from './PostCard.vue'
    import { Post } from '../types/Post';

    defineProps<{
        title: string,
        posts: Post[]
    }>();
</script>

<template>
    <div class="post-list-area">
        <div class="header">
            <Header :text="title" />
        </div>
        <div class="posts">
            <PostCard
                v-for="post in posts"
                :key="post.id"
                :post="post"
            />
        </div>
    </div>
</template>

<style scoped>
    .post-list-area {
        padding-block: 20px;
        padding-inline: 10px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .header {
        margin-inline: 5px;
    }

    .posts {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
