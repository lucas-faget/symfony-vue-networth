<script setup lang="ts">
import RoundButton from "./RoundButton.vue";
import ProfileCard from "./ProfileCard.vue";
import { UserType } from "../types/UserType";

defineProps<{
    title: string;
    users: UserType[];
}>();
</script>

<template>
    <div class="area profile-list">
        <RoundButton :text="title" :isFilled="true" />
        <div class="cards">
            <ProfileCard v-for="user in users" :key="user.id" :user="user" />
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
