<script setup lang="ts">
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import Header from './Header.vue'
    import SimpleProfileCard from './SimpleProfileCard.vue'

    const suggestedUsers = ref([]);

    const fetchSuggestedUsers = () => {
        axios.get("https://localhost:8000/api/users")
        .then(response => {
            suggestedUsers.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
          console.error('Unable to get data from API', error);
        });
    };

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
                :user="user"
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
