<template>
    <div class="navbar-container container mx-auto py-4">
        <user-circle class="member-circle mr-2" :text="user.initials" />
    </div>
</template>

<script>
import { mapState } from 'vuex';
import UserCircle from './user-circle.component';

export default {

    components: {
        UserCircle
    },

    computed: mapState({
        user: function (state) {
            const user = state.user;
            return user ? user : {};
        }
    })

}
</script>

<style lang="scss">
@import "~@/app.scss";
.navbar-container {
  max-width: $max-width !important;
}
.member-circle {
  margin-left: auto;
  cursor: pointer;
}
</style>