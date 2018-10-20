<template>
    <div @click="clickHandler" class="dotted-plus p-2 w-auto h-48 rounded-lg border border-grey border-dashed">
        <icon name="plus-circle" :scale="scale" />
    </div>
</template>

<script>
import Icon from "vue-awesome/components/Icon";
export default {
    props: ["clickHandler", "scale"],
    components: {
        Icon
    }
};
</script>

<style lang="scss" scoped>
.dotted-plus {
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    color: #b8c2cc; //text-grey
    transition: color 100ms;
    margin: 2px;
}
.dotted-plus:hover {
    color: #8795a1; //text-grey-light
}
</style>
