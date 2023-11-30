<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser } from '../api/api';
    
    const route = useRoute();
    const user = ref();

    onMounted(async () => {
        user.value = fetchUser(route.params.id as string);
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
