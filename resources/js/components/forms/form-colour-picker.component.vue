<template>
    <form-element-padding>
        <form-label label="Colour" />
        <!-- TODO move this to controls when needed -->
        <div class="colours">
            <div v-for="colour in colours" :key="colour">
                <div :class="style(colour)" class="colour p-1 rounded-full" @click="select($event, colour)">
                    <icon v-if="selected(colour)" name="check" :scale="1" class="selected" :class="selectedCheck(colour)" />
                </div>
            </div>
        </div>
    </form-element-padding>
</template>

<script>
import { mapState } from "vuex";
import Icon from "vue-awesome/components/Icon";
import FormLabel from "./form-label.component";
import FormElementPadding from "./form-element-padding.component";
import { getClassForColour } from "../../utils/colourable.utils";
export default {
    props: ["value"],
    components: {
        FormLabel,
        FormElementPadding,
        Icon
    },
    methods: {
        style(colour) {
            const background = getClassForColour(colour);
            const border = colour === 0 ? " border-2 border-grey-light" : "";
            return `${background}${border}`;
        },
        selected(colour) {
            return this.value === colour;
        },
        selectedCheck(colour) {
            return colour === 0 ? "selected-white" : "";
        },
        select(e, colour) {
            this.$emit("input", colour);
        }
    },
    computed: mapState({
        colours(state) {
            return state.team.colours;
        }
    })
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.colours {
    display: flex;
    flex-wrap: wrap;
}
.colour {
    width: 30px;
    height: 30px;
    margin-right: 0.25em;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}
.selected {
    color: white;
}
.selected-white {
    color: $text-color;
}
</style>
