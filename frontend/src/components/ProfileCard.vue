<script setup lang="ts">
    import { computed } from 'vue'
    import { User } from '../types/User'
    import { getAvatar } from '../api/avatar'
    
    const props = defineProps<{
        user: User
    }>();

    const backgroundImageStyle = computed(() => ({
        backgroundImage: `url('${getAvatar(props.user.profileImage)}')`
    }));
</script>

<template>
    <router-link :to="{ name: 'user', params: { id: user.id }}">
        <div class="profile-card">
            <div class="profile-image" :style="backgroundImageStyle"></div>
            <div class="text">
                <span class="text-dark text-bold">{{ `${user.firstname} ${user.lastname}` }}</span>
                <span class="text-gray">{{ user.title }}</span>
            </div>
        </div>
    </router-link>
</template>

<style scoped>
    .profile-card {
        background: var(--color-gray-100);
        height: calc(var(--profile-image-size) + 10px);
        padding-inline: 5px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: calc(var(--profile-image-size) + 10px);
    }

    .profile-card:hover {
        background: var(--color-gray-90);
    }

    .profile-image {
        background-size: cover;
        min-width: var(--profile-image-size);
        min-height: var(--profile-image-size);
        border-radius: 100%;
    }

    .text {
        display: flex;
        flex-direction: column;
        font-size: 14px;
        gap: 3px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
