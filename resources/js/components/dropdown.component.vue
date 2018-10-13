<template>
    <card v-if="visible" class="dropdown p-2" v-on-clickaway="clickaway">
        <div v-for="item in items" :key="item.text" class="dropdown-item p-2" @click="click($event, item.callback)">
            {{ item.text }}
        </div>
    </card>
</template>

<script>
import { mixin as clickaway } from "vue-clickaway";
import Card from "../components/card.component";
export default {
    props: ["visible", "items", "clickaway"],
    components: {
        Card
    },
    mixins: [clickaway],
    methods: {
        click(e, callback) {
            e.stopPropagation();
            callback();
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.dropdown {
    position: absolute;
    display: flex;
    flex-direction: column;
}
.dropdown-item {
    color: $text-color;

    &:hover {
        color: $brand-primary;
    }
}
</style>
