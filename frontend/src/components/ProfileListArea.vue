<script setup lang="ts">
    import Header from './Header.vue'
    import ProfileCard from './ProfileCard.vue'
    import { User } from '../types/User';

    defineProps<{
        title: string,
        users: User[]
    }>();
</script>

<template>
    <div class="profile-list-area">
        <div class="header">
            <Header :text="title" />
        </div>
        <div class="cards">
            <ProfileCard
                v-for="user in users"
                :key="user.id"
                :user="user"
            />
        </div>
    </div>
</template>

<style scoped>
    .profile-list-area {
        padding-block: 20px;
        padding-inline: 10px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .header {
        margin-inline: 5px;
    }

    .cards {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
</style>
