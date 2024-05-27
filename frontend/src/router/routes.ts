import HomePage from "../views/HomePage.vue";
import UserPosts from "../components/UserPosts.vue";
import UserProjects from "../components/UserProjects.vue";
import ProfilePage from "../views/ProfilePage.vue";

export const routes = [
    {
        path: "/",
        name: "home",
        component: HomePage,
        children: [
            {
                path: "",
                name: "home_posts",
                component: UserPosts,
            },
            {
                path: "projects",
                name: "home_projects",
                component: UserProjects,
            },
        ],
    },
    {
        path: "/users/:id(\\d+)",
        name: "user",
        component: ProfilePage,
        children: [
            {
                path: "",
                name: "user_posts",
                component: UserPosts,
            },
            {
                path: "projects",
                name: "user_projects",
                component: UserProjects,
            },
        ],
    },
];
