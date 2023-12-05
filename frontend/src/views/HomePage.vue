<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser, fetchSuggestedProfiles } from '../api/api'
    import { connectedUserId } from '../config';

    const user = ref({});
    const users = ref([]);

    onMounted(async () => {
        user.value = await fetchUser(connectedUserId);
        users.value = await fetchSuggestedProfiles(connectedUserId);
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-1">
            <div class="col">
                <ProfileArea :user="user"/>
            </div>
            <div class="col">
                <router-view></router-view>
            </div>
            <div class="col">
                <ProfileListArea title="Suggested profiles" :users="users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
