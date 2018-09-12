import Vue from "vue";
import { sync } from "vuex-router-sync";
import App from "./layouts/app";
import router from "./routes";
import store from "./store";

sync(store, router);

new Vue({
    el: "#app",
    components: { App },
    router,
    store
});
