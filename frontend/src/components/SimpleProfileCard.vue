<script setup lang="ts">
    import { defineProps, computed } from 'vue';
    import { User } from '../types/User'
    
    const props = defineProps<{
        user: User
    }>();

    console.log(props.user);

    function getRandomInt(min: number, max: number): number {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function getRandomAvatar(): string {
        const randomInt: number = getRandomInt(1, 16);
        return `/avatar/${randomInt}.svg`;
    }

    const backgroundImageStyle = computed(() => ({
        backgroundImage: `url('${getRandomAvatar()}')`
    }));
</script>

<template>
    <router-link :to="{ name: 'user', params: { id: user.id }}">
        <div class="simple-profile-card">
            <div class="profile-image" :style="backgroundImageStyle"></div>
            <div class="text">
                <span class="text-dark text-bold">{{ `${user.firstname} ${user.lastname}` }}</span>
                <span class="text-gray">{{ user.title }}</span>
            </div>
        </div>
    </router-link>
</template>

<style scoped>
    .simple-profile-card {
        background: hsl(240,100%,95%);
        height: calc(var(--small-profile-image-size) + 10px);
        padding-inline: 5px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: calc(var(--small-profile-image-size) + 10px);
    }

    .simple-profile-card:hover {
        background: hsl(240,100%,90%);
    }

    .profile-image {
        background-size: cover;
        min-width: var(--small-profile-image-size);
        min-height: var(--small-profile-image-size);
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
