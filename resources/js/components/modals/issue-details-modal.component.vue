<template>
    <modal class="issue-details-modal" :isOpen="issueDetailsModalVisible" :toggle="toggleIssueDetailsModal">
        <form-input label="Name" v-model="name" />
        <div class="pb-4">
            <form-label label="Description"/>
            <autosize-textarea class="textarea appearance-none border rounded w-full py-2 px-3" v-model="description" />
        </div>
        <div class="actions">
            <save-button :onClick="save" :valid="valid" :text="buttonText" />
        </div>
    </modal>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import Modal from './modal.component';
import FormInput from '../forms/form-input.component';
import SaveButton from '../buttons/save-button.component';
import AutosizeTextarea from '../autosize-textarea.component';
import FormLabel from '../forms/form-label.component.vue';

// todos
// tag change UI element
// comments
// save
// err handling generic component

export default {
    components: {
        Modal,
        FormInput,
        SaveButton,
        AutosizeTextarea,
        FormLabel
    },
    data() {
        return {
            name: '',
            description: '',
            working: false
        };
    },
    watch: {
        issue(newVal, oldVal) {
            if (newVal) {
                this.name = newVal.name;
                this.description = newVal.description;
            } else {
                this.name = '';
                this.description = '';
            }
        }
    },
    computed: mapState({
        issueDetailsModalVisible(state) {
            return state.ui.issueDetailsModal.visible;
        },
        issue(state) {
            return state.ui.issueDetailsModal.issue;
        },
        valid() {
            return this.name !== '' && this.description !== '';
        },
        buttonText() {
            return this.working ? 'Saving...' : 'Save';
        }
    }),
    methods: {
        async save() {
            try {
                if (!this.valid) return;
                this.working = true;
                const payload = {
                    ...this.issue,
                    name: this.name,
                    description: this.description
                };
                await this.updateIssue(payload);
                this.toggleIssueDetailsModal();
            } catch (e) {
                console.error(e);
            } finally {
                this.working = false;
            }
        },

        ...mapActions(['toggleIssueDetailsModal', 'updateIssue'])

        // action(payload) {
        //     return this.project
        //         ? this.updateProject({ ...payload, id: this.project.id })
        //         : this.createProject(payload);
        // }
    }
};
</script>

<style lang="scss" scoped>
@import '~@/app.scss';
.issue-details-modal {
    display: flex;
    flex-direction: column;
}
// todo extract into form-autosizetextarea component?
.textarea {
    outline: none;
    transition: box-shadow 100ms, border-color 100ms;
    line-height: 1.3;
}
.textarea:focus {
    box-shadow: 0 0 0 1px $brand-primary;
    border-color: $brand-primary;
}
.actions {
    display: flex;
}
</style>
