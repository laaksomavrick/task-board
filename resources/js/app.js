import Vue from "vue";
import { sync } from "vuex-router-sync";
import App from "./layouts/app.layout";
import router from "./app.routes";
import store from "./store/app.store";

//import "vue-material-design-icons/styles.css";
import "vue-awesome/icons/plus-circle";

sync(store, router);

new Vue({
    el: "#app",
    components: { App },
    router,
    store
});
