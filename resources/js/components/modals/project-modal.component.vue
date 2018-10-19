<template>
    <modal class="project-modal" :isOpen="projectModalVisible" :toggle="toggleProjectModal">
        <form-input label="Project" v-model="name" />
        <form-input label="Description" v-model="description" />
        <form-colour-picker v-model="colour" />
        <div class="actions">
            <save-button :onClick="save" :valid="valid" :text="buttonText" />
        </div>
    </modal>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Modal from "./modal.component";
import FormInput from "../forms/form-input.component";
import FormColourPicker from "../forms/form-colour-picker.component";
import SaveButton from "../buttons/save-button.component";

// todos
// err handling generic component

export default {
    components: {
        Modal,
        FormInput,
        FormColourPicker,
        SaveButton
    },
    data() {
        return {
            name: "",
            description: "",
            colour: null, //team.defaultColour
            working: false
        };
    },
    watch: {
        project(newVal, oldVal) {
            if (newVal) {
                this.name = newVal.name;
                this.description = newVal.description;
                this.colour = newVal.colour;
            } else {
                this.name = "";
                this.description = "";
                this.colour = null;
            }
        }
    },
    computed: mapState({
        projectModalVisible(state) {
            return state.ui.projectModal.visible;
        },
        project(state) {
            return state.ui.projectModal.project;
        },
        valid() {
            return (
                this.name !== "" &&
                this.description !== "" &&
                this.colour !== null
            );
        },
        buttonText() {
            return this.working ? "Saving..." : "Save";
        }
    }),
    methods: {
        ...mapActions(["toggleProjectModal", "createProject", "updateProject"]),

        async save() {
            try {
                if (!this.valid) return;
                this.working = true;
                const payload = {
                    name: this.name,
                    description: this.description,
                    colour: this.colour
                };
                await this.action(payload);
                this.toggleProjectModal();
            } catch (e) {
                console.error(e);
            } finally {
                this.working = false;
            }
        },

        action(payload) {
            return this.project
                ? this.updateProject({ ...payload, id: this.project.id })
                : this.createProject(payload);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.project-modal {
    display: flex;
    flex-direction: column;
}
.actions {
    display: flex;
}
</style>
