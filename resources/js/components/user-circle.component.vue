<template>
    <div class="user-circle p-1 rounded-full" :class="backgroundColour">
        <div class="user-initial">
            {{ initials }}
        </div>
    </div>
</template>

<script>
import { getClassForColour } from "../utils/colourable.utils";
export default {
    props: ["user"],
    computed: {
        backgroundColour() {
            const colour = this.user && this.user.colour ? this.user.colour : 0;
            return getClassForColour(colour);
        },
        initials() {
            const initials =
                this.user && this.user.initials ? this.user.initials : "";
            return initials;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.user-circle {
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    width: 37.5px;
    height: 37.5px;
    font-weight: 600;
    cursor: pointer;
}
.user-circle:not(:first-child) {
    margin-left: -7.5px;
}
.user-initial {
    margin-top: 2px;
    // user-select: none;
}
</style>
