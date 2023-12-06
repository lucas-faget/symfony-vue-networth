<script setup lang="ts">
    import { useRoute } from 'vue-router'
    import RoundButton from './RoundButton.vue'
    import type { RouteType } from '../types/RouteType'

    defineProps<{
        routes: RouteType[]
    }>();

    const route = useRoute();
</script>

<template>
    <div class="area buttons">
        <router-link v-for="nestedRoute in routes" :key="nestedRoute.id" :to="{name: nestedRoute.name}">
            <RoundButton :text="nestedRoute.title" :isFilled="route.name === nestedRoute.name" />
        </router-link>
    </div>
</template>

<style scoped>
    .buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
</style>
