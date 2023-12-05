<script setup lang="ts">
    import Button from './Button.vue';
    import ProfileCard from './ProfileCard.vue'
    import { UserType } from '../types/UserType';

    defineProps<{
        title: string,
        users: UserType[]
    }>();
</script>

<template>
    <div class="area profile-list">
        <Button :text="title" />
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
    .profile-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .cards {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
</style>
