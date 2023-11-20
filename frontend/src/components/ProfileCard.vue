<script lang="ts">

</script>

<template>
    <div class="profile-card">
        <div class="background-image"></div>
        <div class="profile-image"></div>
    </div>
</template>

<style scoped>
    .profile-card {
        position: relative;
    }

    .background-image {
        background: url("/banner_cv.png");
        background-size: cover;
        position: absolute;
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
        border: 3px solid var(--color-white);
        border-radius: 100%;
    }
</style>
