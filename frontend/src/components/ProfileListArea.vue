<script setup lang="ts">
    import ProfileCard from './ProfileCard.vue'
    import { User } from '../types/User';

    defineProps<{
        users: User[]
    }>();
</script>

<template>
    <div class="area cards">
        <ProfileCard
            v-for="user in users"
            :key="user.id"
            :user="user"
        />
    </div>
</template>

<style scoped>
    .cards {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
</style>
