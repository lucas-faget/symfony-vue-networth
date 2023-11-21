<script setup lang="ts">
    import { defineProps, computed } from 'vue';
    
    const props = defineProps<{
        image: string,
        name: string,
        title: string
    }>();

    console.log(props.image)

    const backgroundImageStyle = computed(() => ({
        backgroundImage: `url('${props.image}')`
    }));
</script>

<template>
    <div class="simple-profile-card">
        <div class="profile-image" :style="backgroundImageStyle"></div>
        <div class="text">
            <span class="text-dark text-bold">{{ name }}</span>
            <span class="text-gray">{{ title }}</span>
        </div>
    </div>
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
