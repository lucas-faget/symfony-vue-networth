<script setup lang="ts">
    import SimpleProfileCard from './SimpleProfileCard.vue'
</script>

<template>
    <div class="suggested-profiles">
        <span class="text-dark">Suggested profiles</span>
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
        <SimpleProfileCard />
    </div>
</template>

<style scoped>
    .suggested-profiles {
        position: relative;
        padding-block: 20px;
        padding-inline: 10px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
</style>
