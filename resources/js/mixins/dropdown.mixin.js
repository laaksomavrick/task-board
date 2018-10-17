import { mapActions } from "vuex";

export default {
    methods: {
        handleDropdownClick(e) {
            e.stopPropagation();
            const id = this.$refs.dropdown.uuid;
            this.toggleDropdown(id);
        },
        closeDropdown() {
            this.toggleDropdown(null);
        },
        ...mapActions(["toggleDropdown"])
    }
};
