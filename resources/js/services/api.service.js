import axios from "../http";

export default class ApiService {
    constructor(resource) {
        this.resource = resource;
    }

    /**
     * Get all
     */
    async index() {
        return axios.get(`/${this.resource}`);
    }

    /**
     * Get one
     */
    async show(id) {
        return axios.get(`/${this.resource}/${id}`);
    }

    /**
     * Store one
     */
    async store(payload) {
        return axios.post(`/${this.resource}`, payload);
    }

    /**
     * Update one
     */
    async update(id, payload) {
        return axios.patch(`/${this.resource}/${id}`, payload);
    }

    /**
     * Destroy one
     */
    async destroy(id) {
        return axios.delete(`/${this.resource}/${id}`);
    }
}
