<script setup lang="ts">
    import Tag from './Tag.vue'
</script>

<template>
    <div class="profile-area">
        <div class="background-image"></div>
        <div class="profile-image"></div>

        <div class="content">
            <div class="title">
                <span class="name text-dark text-bold">Lucas Faget</span>
                <span class="text-gray">Développeur web</span>
            </div>
            <div class="tags">
                <Tag text="Vue.js" />
                <Tag text="TypeScript" />
                <Tag text="Symfony" />
                <Tag text="API" />
                <Tag text="MySQL" />
                <Tag text="Docker" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    .profile-area {
        position: relative;
        padding-top: calc(var(--background-image-height) + var(--profile-image-size)/2 + 20px);
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
        height: var(--background-image-height);
        border-radius: 10px 10px 0 0;
    }

    .profile-image {
        background: url("/avatar/6.svg");
        background-size: cover;
        position: absolute;
        top: calc(var(--background-image-height) - (var(--profile-image-size) / 2));
        left: calc(50% - (var(--profile-image-size) / 2));
        width: var(--profile-image-size);
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
