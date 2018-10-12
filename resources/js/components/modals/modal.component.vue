<template>
    <div v-if="isOpen" @click.self="maskClicked" class="modal-mask fixed pin z-50 overflow-auto flex">
        <transition name="modal">
            <card class="modal-container relative p-8 bg-white w-full max-w-md m-auto flex-col flex shadow-lg">
                <slot></slot>
            </card>
        </transition>
    </div>
</template>

<script>
import Card from "../card.component";

export default {
    components: {
        Card
    },
    props: ["isOpen", "toggle"],
    methods: {
        maskClicked: function() {
            this.toggle();
        }
    }
};
</script>

<style lang="scss" scoped>
.modal-mask {
    background-color: rgba(0, 0, 0, 0.2);
}
</style>
