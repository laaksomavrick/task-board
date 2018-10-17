<template>
    <textarea v-bind:value="value" v-on:input="handleInput"></textarea>
</template>

<script>
import autosize from "autosize";
export default {
    props: ["value"],
    mounted() {
        autosize(this.$el);
    },
    watch: {
        value: function(val) {
            this.$el.value = val;
            autosize.update(this.$el);
        }
    },
    methods: {
        handleInput(e) {
            this.$emit("input", e.target.value);
        }
    }
};
</script>
