<template>
    <div class="navbar w-screen p-4">
        <user-circle class="member-circle" :text="user.initials" />
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

<style>
.navbar {
  display: flex;
}
.member-circle {
  margin-left: auto;
  cursor: pointer;
}
</style>