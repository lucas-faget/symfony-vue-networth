<script setup lang="ts">
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import Header from './Header.vue'
    import ProfileCard from './ProfileCard.vue'

    defineProps<{
        title: string
    }>();

    const users = ref([]);

    const fetchUsers = () => {
        axios.get("https://localhost:8000/api/users")
        .then(response => {
            users.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
            console.error('Unable to get data from API', error);
        });
    };

    onMounted(fetchUsers);
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
