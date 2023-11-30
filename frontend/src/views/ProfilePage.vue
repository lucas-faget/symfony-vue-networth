<script setup lang="ts">
    import { ref, watch, onMounted } from 'vue'
    import { useRoute } from 'vue-router'
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
    import { fetchUser } from '../api/api'
    
    const route = useRoute();
    const user = ref({});

    watch(() => route.params.id,
        async newId => {
            user.value = await fetchUser(newId as string)
        }
    )

    onMounted(async () => {
        user.value = await fetchUser(route.params.id as string);
    });
</script>

<template>
    <div class="page">
        <div class="grid grid-2">
            <div>
                <ProfileArea :user="user" />
            </div>
            <div>
                <ProfileListArea title="Similar users" />
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>
