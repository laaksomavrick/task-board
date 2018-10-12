<template>
    <modal class="confirmation-modal" :isOpen="confirmationModalVisible" :toggle="toggleConfirmationModal">
        {{ message }}
        <div class="actions">
            <button @click="destroy" class="destroy border py-2 px-4 rounded text-grey-light">Delete</button>
        </div>

    </modal>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Modal from './modal.component';

export default {
    components: {
        Modal
    },
    data () {
        return {
            working: false
        }
    },
    computed: mapState({
        confirmationModalVisible (state) {
            return state.ui.confirmationModal.visible;
        },
        message (state) {
            return state.ui.confirmationModal.message;
        },
        data (state) {
            return state.ui.confirmationModal;
        }
    }),
    methods: {

        async destroy () {
            try {
                this.working = true;
                await this.data.callback();
                this.toggleConfirmationModal();
            } catch (e) {
                // todo handle error
                console.error(e);
            } finally {
                this.working = false;
            }
        },

        ...mapActions([
            'toggleConfirmationModal'
        ])
    }
}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.confirmation-modal {
  display: flex;
  flex-direction: column;
}
.input {
  outline: none;
  transition: box-shadow 100ms, border-color 100ms;
}
.input:focus {
  box-shadow: 0 0 0 1px $brand-primary;
  border-color: $brand-primary;
}
.actions {
  display: flex;
}
.destroy {
  margin-left: auto;
  width: auto;
  color: $brand-danger;
}
.destroy:focus {
  outline: none;
}
</style>
