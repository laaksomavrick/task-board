<template>
    <card v-if="visible" class="dropdown p-2" v-on-clickaway="close">
        <div v-for="item in items" :key="item.text" class="dropdown-item p-2" @click="click($event, item.callback)">
            {{ item.text }}
        </div>
    </card>
</template>

<script>
// really need to figure out auto positioning for this
// whenever the modal becomes visible, position it (mounted), then display it

import { mapState } from "vuex";
import { mixin as clickaway } from "vue-clickaway";
import uuid from "../mixins/uuid.mixin.js";
import Card from "../components/card.component";
export default {
  props: ["items", "close"],
  components: {
    Card
  },
  mixins: [clickaway, uuid],
  methods: {
    click(e, callback) {
      e.stopPropagation();
      callback();
    }
  },
  computed: mapState({
    visible(state) {
      return state.ui.dropdown === this.uuid;
    }
  })
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.dropdown {
  position: absolute;
  display: flex;
  flex-direction: column;
}
.dropdown-item {
  color: $text-color;

  &:hover {
    color: $brand-primary;
  }
}
</style>
