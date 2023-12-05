<script setup lang="ts">
    import { ref, watch, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import Header from '../components/Header.vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser, fetchSimilarProfiles } from '../api/api'
    
    const route = useRoute();
    const user = ref({});
    const users = ref([]);

    watch(() => route.params.id,
        async newId => {
            user.value = await fetchUser(newId as string)
            users.value = await fetchSimilarProfiles(newId as string);
        }
    )

    onMounted(async () => {
        user.value = await fetchUser(route.params.id as string);
        users.value = await fetchSimilarProfiles(route.params.id as string);
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-2">
            <div class="col">
                <ProfileArea :user="user" />
            </div>
            <div class="col">
                <Header title="Similar profiles" />
                <ProfileListArea :users="users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
