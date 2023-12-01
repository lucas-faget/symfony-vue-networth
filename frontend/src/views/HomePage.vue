<script setup lang="ts">
    import { ref, onMounted } from 'vue'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser } from '../api/api'

    const user = ref({});

    onMounted(async () => {
        user.value = await fetchUser('1');
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-1">
            <div>
                <ProfileArea :user="user"/>
            </div>
            <div>
                middle
            </div>
            <div>
                <ProfileListArea title="Suggested users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
