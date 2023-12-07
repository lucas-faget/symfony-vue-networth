<script setup lang="ts">
    import PostHead from './PostHead.vue'
    import ProfileCard from './ProfileCard.vue'
    import { PostType } from '../types/PostType';
    import { getRandomImageUrl } from '../api/image';

    defineProps<{
        post: PostType
    }>();
</script>

<template>
    <div class="area post">
        <PostHead type="Post" date="3 days ago" />
        <div class="content">
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
    </div>
</template>

<style scoped>
    .head {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
