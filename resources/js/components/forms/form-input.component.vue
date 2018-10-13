<template>
    <form-element-padding>
        <form-label :label="label" />
        <div>
            <!-- TODO move this to controls when needed -->
            <input v-bind:value="value" v-on:input="handleInput" class="input appearance-none border rounded w-full py-2 px-3" type="text" :placeholder="placeholder">
        </div>
    </form-element-padding>
</template>

<script>
import FormLabel from "./form-label.component";
import FormElementPadding from "./form-element-padding.component";
export default {
    props: ["label", "value"],
    components: {
        FormLabel,
        FormElementPadding
    },
    methods: {
        handleInput(e) {
            this.$emit("input", e.target.value);
        }
    },
    computed: {
        placeholder() {
            return ``;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.input {
    outline: none;
    transition: box-shadow 100ms, border-color 100ms;
}
.input:focus {
    box-shadow: 0 0 0 1px $brand-primary;
    border-color: $brand-primary;
}
</style>
