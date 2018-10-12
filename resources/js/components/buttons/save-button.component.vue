<template>
    <button @click="onClick" class="save border py-2 px-4 rounded text-grey-light" :class="{ 'active': valid }">{{ text }}</button>
</template>

<script>
export default {
    props: [
        'onClick',
        'valid',
        'text'
    ]
}
</script>

<style lang="scss" scoped>
</style>