<script setup lang="ts">
    import ProfileCard from './ProfileCard.vue'
    import { UserType } from '../types/UserType';

    defineProps<{
        users: UserType[]
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
