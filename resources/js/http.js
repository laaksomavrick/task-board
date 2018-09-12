import axios from "axios";

axios.interceptors.request.use(config => {
    config.headers.common["X-Requested-With"] = "XMLHttpRequest";
    const token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        config.headers.common["X-CSRF-TOKEN"] = token.content;
    }
    return config;
});

export default axios;
