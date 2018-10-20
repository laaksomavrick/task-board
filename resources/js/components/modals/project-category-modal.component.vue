<template>
    <modal class="project-category-modal" :isOpen="projectCategoryModalVisible" :toggle="toggleProjectCategoryModal">
        <form-input label="Category" v-model="name" />
        <div class="actions">
            <save-button :onClick="save" :valid="valid" :text="buttonText" />
        </div>
    </modal>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Modal from "./modal.component";
import FormInput from "../forms/form-input.component";
import SaveButton from "../buttons/save-button.component";

export default {
    components: {
        Modal,
        FormInput,
        SaveButton
    },
    data() {
        return {
            name: "",
            working: false
        };
    },
    watch: {
        projectCategory(newVal) {
            if (newVal) {
                this.name = newVal.name;
            } else {
                this.name = "";
            }
        }
    },
    computed: mapState({
        projectCategoryModalVisible(state) {
            return state.ui.projectCategoryModal.visible;
        },
        projectCategory(state) {
            return state.ui.projectCategoryModal.projectCategory;
        },
        valid() {
            return this.name !== "";
        },
        buttonText() {
            return this.working ? "Saving..." : "Save";
        }
    }),
    methods: {
        ...mapActions([
            "toggleProjectCategoryModal",
            "createProjectCategory",
            "updateProjectCategory"
        ]),

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
                this.toggleProjectCategoryModal();
            } catch (e) {
                console.error(e);
            } finally {
                this.working = false;
            }
        },

        action(payload) {
            return this.project
                ? this.updateProjectCategory({
                      ...payload,
                      id: this.projectCategory.id
                  })
                : this.createProjectCategory(payload);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.project-category-modal {
    display: flex;
    flex-direction: column;
}
.actions {
    display: flex;
}
</style>
