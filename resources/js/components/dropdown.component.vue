<template>
  <div class="dropdown">
    <div class="dropdown-button mx-4 my-2" @click="toggle">
      <!-- needs options for left, right, center, etc -->
      <slot></slot>
    </div>
    <card v-if="visible"
    class="dropdown-list p-2"
    :style="{top: `${top}px`, left: `${left}px`}"
    :id="uuid"
    v-on-clickaway="close">
        <div v-for="item in items" :key="item.text" class="dropdown-item p-2" @click="click($event, item.callback)">
            {{ item.text }}
        </div>
    </card>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import { mixin as clickaway } from 'vue-clickaway';
import Card from '../components/card.component';
import Icon from 'vue-awesome/components/Icon';
import uuid from '../mixins/uuid.mixin';
export default {
    props: ['items'],
    components: {
        Card,
        Icon,
    },
    data() {
        return {
            visible: false,
            top: undefined,
            left: undefined,
            align: 'bottom',
        };
    },
    mixins: [clickaway, uuid],
    watch: {
        visible(visible) {
            if (visible) {
                this.$nextTick(() => {
                    this.position();
                });
            }
        },
    },
    methods: {
        click(e, callback) {
            e.stopPropagation();
            callback();
        },
        toggle(e) {
            e.stopPropagation();
            this.visible = !this.visible;
        },
        close() {
            this.visible = false;
        },
        position() {
            const button = this.$el.firstElementChild;
            const body = document.getElementById(this.uuid);
            const btnRect = button.getBoundingClientRect();

            const coords = {
                top: btnRect.top - pageYOffset,
                left: btnRect.left - pageXOffset,
            };

            const currentTop = coords.top;
            const currentLeft = coords.left;

            const btnWidth = button.offsetWidth;
            const btnHeight = button.offsetHeight;

            const bodyWidth = body.offsetWidth;
            const bodyHeight = body.offsetHeight;

            switch (this.align) {
                case 'top':
                    this.top = currentTop + pageYOffset - bodyHeight;
                    this.left = currentLeft + pageXOffset;
                    break;
                case 'right':
                    this.top = currentTop + pageYOffset;
                    this.left = currentLeft + pageXOffset + btnWidth;
                    break;
                case 'bottom':
                    this.top = currentTop + pageYOffset + btnHeight;
                    this.left = currentLeft + pageXOffset;
                    break;
                case 'left':
                    this.top = currentTop + pageYOffset;
                    this.left = currentLeft + pageXOffset - bodyWidth;
                    break;
                default:
                    this.top = currentTop + pageYOffset + btnHeight;
                    this.left = currentLeft + pageXOffset;
                    break;
            }
        },
    },
    // computed: mapState({
    //   visible(state) {
    //     return state.ui.dropdown === this.uuid;
    //   }
    // })
};
</script>

<style lang="scss" scoped>
@import '~@/app.scss';
.dropdown {
    display: flex;
    flex-direction: column;
}
.dropdown-button {
    display: flex;
    flex: 1;
}
.dropdown-list {
    position: absolute;
}
// .dropdown {
//   position: absolute;
//   display: flex;
//   flex-direction: column;
// }

.dropdown-item {
    color: $text-color;

    &:hover {
        color: $brand-primary;
    }
}
</style>
