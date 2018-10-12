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
    props: [
        'label',
        'value'
    ],
    methods: {
        handleInput (e) {
            this.$emit('input', e.target.value);
        }
    }
}

</script>

<style lang="scss" scoped>
</style>