<script setup lang="ts">
import { ref, watch, onMounted } from "vue";
import { useRoute } from "vue-router";
import ProfileArea from "../components/ProfileArea.vue";
import ProfileListArea from "../components/ProfileListArea.vue";
import NestedLinksArea from "../components/NestedLinksArea.vue";
import { fetchUser, fetchSimilarProfiles } from "../api/api";
import { RouteType } from "../types/RouteType";

const route = useRoute();
const routes: RouteType[] = [
    {
        id: 1,
        title: "Posts",
        name: "user_posts",
    },
    {
        id: 2,
        title: "Projects",
        name: "user_projects",
    },
];

const user = ref({});
const users = ref([]);

watch(
    () => route.params.id,
    async (newId) => {
        user.value = await fetchUser(newId as string);
        users.value = await fetchSimilarProfiles(newId as string);
    }
);

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
                <NestedLinksArea :routes="routes" />
                <router-view></router-view>
            </div>
            <div class="col">
                <ProfileListArea title="Similar profiles" :users="users" />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
