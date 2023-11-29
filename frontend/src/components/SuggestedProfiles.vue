<script setup lang="ts">
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import Header from './Header.vue'
    import SimpleProfileCard from './SimpleProfileCard.vue'

    const suggestedUsers = ref([]);

    const fetchSuggestedUsers = () => {
        axios.get("https://localhost:8000/api/user/")
        .then(response => {
            suggestedUsers.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
          console.error('Unable to get data from API', error);
        });
    };

    function getRandomInt(min: number, max: number): number {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function getRandomAvatar(): string {
        const randomInt: number = getRandomInt(1, 16);
        return `/avatar/${randomInt}.svg`;
    }

    function getUserName(firstname: string, lastname: string): string {
        return `${firstname} ${lastname}`;
    }

    onMounted(fetchSuggestedUsers);
</script>

<template>
    <div class="suggested-profiles">
        <div class="header">
            <Header text="Suggested profiles" />
        </div>
        <div class="cards">
            <SimpleProfileCard
                v-for="user in suggestedUsers"
                :key="user.id"
                :image="getRandomAvatar()"
                :name="getUserName(user.firstname, user.lastname)"
                :title="user.title"
            />
        </div>
    </div>
</template>

<style scoped>
    .suggested-profiles {
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
