<script setup lang="ts">
    import { ref, computed, onMounted } from 'vue'
    import Tag from './Tag.vue'
    import { User } from '../types/User'
    import { getRandomAvatar } from '../api/avatar'

    defineProps<{
        user: User|{}
    }>();

    const backgroundImage = ref(null);
    const backgroundImageHeight = ref(0);

    const profileArenaStyle = computed(() => ({
        paddingTop: `calc(${backgroundImageHeight.value}px + var(--medium-profile-image-size)/2 + 20px)`
    }));

    const profileImageStyle = computed(() => ({
        backgroundImage: `url('${getRandomAvatar()}')`,
        top: `calc(${backgroundImageHeight.value}px - (var(--medium-profile-image-size) / 2))`
    }));

    const calculateBackgroundImageHeight = () => {
        backgroundImageHeight.value = backgroundImage.value?.clientHeight || 0;
    };

    onMounted(() => {
        calculateBackgroundImageHeight();
        window.addEventListener('resize', calculateBackgroundImageHeight);
    });
</script>

<template>
    <div class="profile-area" :style="profileArenaStyle">
        <div class="background-image" ref="backgroundImage"></div>
        <div class="profile-image" :style="profileImageStyle"></div>

        <div class="content">
            <div class="title">
                <span class="name text-dark text-bold">{{ `${user.firstname} ${user.lastname}` }}</span>
                <span class="text-gray">{{ user.title }}</span>
            </div>
            <div class="tags">
                <Tag
                    v-for="tag in user.tags"
                    :key="tag.id"
                    :text="tag.name"
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
    .profile-area {
        position: relative;
        /* padding-top: calc(var(--background-image-height) + var(--medium-profile-image-size)/2 + 20px); */
        padding-bottom: 20px;
        padding-inline: 10px;
    }

    .background-image {
        background: url("/banner_cv.png");
        background-size: cover;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        aspect-ratio: 4 / 1;
        border-radius: 10px 10px 0 0;
    }

    .profile-image {
        background-size: cover;
        position: absolute;
        /* top: calc(var(--background-image-height) - (var(--medium-profile-image-size) / 2)); */
        left: calc(50% - (var(--medium-profile-image-size) / 2));
        width: var(--medium-profile-image-size);
        aspect-ratio: 1/1;
        border: 3px solid var(--color-gray-100);
        border-radius: 100%;
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .title {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .name {
        font-size: 20px;
    }

    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
</style>
