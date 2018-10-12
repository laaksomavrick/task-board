<template>
    <div class="pb-4">
        <div class="mb-2">
            <label class="text-grey-dark">
                {{ label }}
            </label>
        </div>
        <div>
            <input v-bind:value="value" v-on:input="handleInput" class="input appearance-none border rounded w-full py-2 px-3" type="text" placeholder="Name">
        </div>
    </div>
</template>

<script>
export default {
    props: ["label", "value"],
    methods: {
        handleInput(e) {
            this.$emit("input", e.target.value);
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
