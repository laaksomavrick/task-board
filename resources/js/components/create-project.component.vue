<template>
    <div @click="toggleProjectModal" class="create-project p-4 w-auto h-48 rounded-lg border border-grey border-dashed">
        <icon name="plus-circle" :scale="2.5" />
    </div>
</template>

<script>
import Icon from "vue-awesome/components/Icon";
import { mapActions } from "vuex";
export default {
    components: {
        Icon
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
