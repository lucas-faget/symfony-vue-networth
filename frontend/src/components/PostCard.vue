<script setup lang="ts">
    import ProfileCard from './ProfileCard.vue'
    import { Post } from '../types/Post';
    import { getRandomImageUrl } from '../api/image';

    defineProps<{
        post: Post
    }>();
</script>

<template>
    <div class="post">
        <ProfileCard
            v-if="post.author"
            :key="post.author.id"
            :user="post.author"
        />
        <div class="content">
            {{ post.content }}
        </div>
        <!-- <img v-if="post.image" :src="post.image" alt="post_image" /> -->
        <img :src="getRandomImageUrl()" alt="post_image" />
    </div>
</template>

<style scoped>
    .post {
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        border: 1px solid var(--color-gray-70);
        border-radius: 10px;
    }
</style>
