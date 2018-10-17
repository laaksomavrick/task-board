<template>
    <div class="add-issue py-2">
        <card class="card p-4">
            <autosize-textarea class="textarea" v-model="name" @keyup.enter="submit" />
        </card>
    </div>
</template>

<script>
import AutosizeTextarea from "./autosize-textarea.component";
import Card from "./card.component";

export default {
    props: [],
    components: {
        AutosizeTextarea,
        Card
    },
    data() {
        return {
            name: ""
        };
    },
    methods: {
        submit() {},
        validate() {}
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.card {
    display: flex;
}
.textarea {
    color: $text-color;
    border: none;
    outline: none;
    flex: 1;
}
</style>
