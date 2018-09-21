<template>
    <modal class="create-project-modal" :isOpen="createProjectModalVisible" :toggle="toggleCreateProjectModal">
        <label>
            Project
        </label>
        <input v-model="name" class="appearance-none border rounded w-full py-2 px-3" type="text" placeholder="Name">
        <label>
            Description
        </label>
        <input v-model="description" class="appearance-none border rounded w-full py-2 px-3" type="text" placeholder="Name">
        <button @click="save" class="border p-2">Save</button>
    </modal>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Modal from './modal.component';

// todos
// styling / polish
// err handling
// additional functionality on projects (color picker?)
export default {
    components: {
        Modal
    },
    data () {
        return {
            name: '',
            description: ''
        }
    },
    computed: mapState({
        createProjectModalVisible: function (state) {
            return state.ui.createProjectModalVisible;
        }
    }),
    methods: {
        ...mapActions([
            'toggleCreateProjectModal',
            'createProject'
        ]),

        async save () {
            try {
                const payload = { name: this.name, description: this.description }
                await this.createProject(payload);
                this.toggleCreateProjectModal();
            } catch (e) {
                console.error(e);
            }
        }
    }
}
</script>

<style>
.create-project-modal {
  display: flex;
  flex-direction: column;
}
</style>
