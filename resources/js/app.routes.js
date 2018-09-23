import Vue from "vue";
import Router from "vue-router";
import Projects from "./views/projects.view";
import Kanban from "./views/kanban.view";

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            component: Projects
        },
        {
            path: "/projects/:id",
            name: "kanban",
            component: Kanban
        },
        {
            path: "*",
            redirect: "/"
        }
    ]
});

export default router;
