<template>
    <modal class="create-project-modal" :isOpen="createProjectModalVisible" :toggle="toggleCreateProjectModal">

        <div class="pb-4">
            <div class="mb-2">
                <label class="text-grey-dark">
                    Project
                </label>
            </div>
            <div>
                <input v-model="name" class="input appearance-none border rounded w-full py-2 px-3" type="text" placeholder="Name">
            </div>
        </div>

        <div class="pb-4">
            <div class="mb-2">
                <label class="text-grey-dark">
                    Description
                </label>
            </div>
            <div>
                <input v-model="description" class="input appearance-none border rounded w-full py-2 px-3" type="text" placeholder="Description">
            </div>
        </div>

        <div class="actions">
            <button @click="save" class="save border py-2 px-4 rounded text-grey-light" :class="{ 'active': this.valid }">{{ buttonText }}</button>
        </div>

    </modal>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Modal from './modal.component';

// todos
// err handling generic component
// color picker
export default {
    components: {
        Modal
    },
    data () {
        return {
            name: '',
            description: '',
            saving: false
        }
    },
    computed: mapState({
        createProjectModalVisible: function (state) {
            return state.ui.createProjectModalVisible;
        },
        valid () {
            return this.name !== '' && this.description !== '';
        },
        buttonText () {
            return this.saving ? 'Saving...' : 'Save';
        }
    }),
    methods: {
        ...mapActions([
            'toggleCreateProjectModal',
            'createProject'
        ]),

        async save () {
            try {
                if (!this.valid) return;
                this.saving = true;
                const payload = { name: this.name, description: this.description }
                await this.createProject(payload);
                this.toggleCreateProjectModal();
            } catch (e) {
                console.error(e);
            } finally {
                this.saving = false;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.create-project-modal {
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
.save {
  margin-left: auto;
  width: auto;
}
.save:focus {
  outline: none;
}
.active {
  color: $brand-primary;
}
</style>
