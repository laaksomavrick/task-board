import Vue from "vue";
import Router from "vue-router";
import Projects from "./views/projects.view";

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            component: Projects
        },
        {
            path: "*",
            redirect: "/"
        }
    ]
});

export default router;
