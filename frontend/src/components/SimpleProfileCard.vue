<script setup lang="ts">
    
</script>

<template>
    <div class="simple-profile-card">
        <div class="profile-image"></div>
        <div class="text">
            <span class="text-dark text-bold">Lucas Faget</span>
            <span class="text-gray">Développeur web</span>
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
        background: url("/avatar/6.svg");
        background-size: cover;
        width: var(--small-profile-image-size);
        height: var(--small-profile-image-size);
        border-radius: 100%;
    }

    .text {
        display: flex;
        flex-direction: column;
        font-size: 14px;
        gap: 3px;
    }
</style>
