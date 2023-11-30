<script setup lang="ts">
    import ProfileArea from '../components/ProfileArea.vue'
    import ProfileListArea from '../components/ProfileListArea.vue'
</script>

<template>
    <div class="page">
        <div class="grid grid-1">
            <div>
                <ProfileArea />
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
