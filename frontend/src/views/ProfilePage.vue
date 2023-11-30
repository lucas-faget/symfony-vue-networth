<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import axios from 'axios';
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    
    const route = useRoute();
    const user = ref();

    const fetchUser = (id: string) => {
        axios.get(`https://localhost:8000/api/users/${id}`)
        .then(response => {
            user.value = response.data;
            console.log(response.data);
        })
        .catch(error => {
            console.error('Unable to get data from API', error);
        });
    };

    console.log(route.params.id);
    onMounted(() => {
        fetchUser(route.params.id as string)
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-2">
            <div>
                <ProfileArea />
            </div>
            <div>
                <ProfileListArea title="Similar users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
