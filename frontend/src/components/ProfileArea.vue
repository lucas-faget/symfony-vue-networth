<script setup lang="ts">
    import { ref, computed, onMounted } from 'vue'
    import TagList from './TagList.vue'
    import { UserType } from '../types/UserType'
    import { getAvatar } from '../api/image'

    const props = defineProps<{
        user: UserType|{}
    }>();

    const backgroundImage = ref(null);
    const backgroundImageHeight = ref(0);

    const profileImageSize = computed(() => backgroundImageHeight.value);

    const profileArenaStyle = computed(() => ({
        paddingTop: `calc(${backgroundImageHeight.value}px + ${profileImageSize.value/2}px + 20px)`
    }));

    const profileImageStyle = computed(() => ({
        backgroundImage: `url('${getAvatar(props.user.profileImage)}')`,
        top: `calc(${backgroundImageHeight.value}px - ${profileImageSize.value/2}px)`,
        left: `calc(50% - ${backgroundImageHeight.value/2}px)`,
        width: `${profileImageSize.value}px`
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
    <div class="area profile-area" :style="profileArenaStyle">
        <div class="background-image" ref="backgroundImage"></div>
        <div class="profile-image" :style="profileImageStyle"></div>

        <div class="content">
            <div class="text">
                <span class="text-dark text-large text-bold">{{ `${user.firstname} ${user.lastname}` }}</span>
                <span class="text-gray">{{ user.title }}</span>
            </div>
            <TagList v-if="user.tags" :tags="user.tags"/>
        </div>
    </div>
</template>

<style scoped>
    .profile-area {
        position: relative;
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

    .text {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
</style>
