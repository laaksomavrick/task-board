<template>
    <dotted-plus :clickHandler="toggleProjectModal" scale="2.5" />
</template>

<script>
import { mapActions } from "vuex";
import DottedPlus from "./styles/dotted-plus.component";
export default {
    components: {
        DottedPlus
    },
    methods: {
        ...mapActions(["toggleProjectModal"])
    }
};
</script>

<style lang="scss" scoped>
.create-project {
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    color: #b8c2cc; //text-grey
    transition: color 100ms;
    margin: 2px;
}
.create-project:hover {
    color: #8795a1; //text-grey-light
}
</style>
