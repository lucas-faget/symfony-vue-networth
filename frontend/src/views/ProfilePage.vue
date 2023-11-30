<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import axios from 'axios';
    
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
            <div>left</div>
            <div>right</div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
