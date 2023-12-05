<script setup lang="ts">
    import ProfileCard from './ProfileCard.vue'
    import { PostType } from '../types/PostType';
    import { getRandomImageUrl } from '../api/image';

    defineProps<{
        post: PostType
    }>();
</script>

<template>
    <div class="area post">
        <ProfileCard
            v-if="post.author"
            :key="post.author.id"
            :user="post.author"
        />
        <div class="text-dark">
            {{ post.content }}
        </div>
        <!-- <img v-if="post.image" :src="post.image" alt="post_image" /> -->
        <img :src="getRandomImageUrl()" alt="post_image" />
    </div>
</template>

<style scoped>
    .post {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
