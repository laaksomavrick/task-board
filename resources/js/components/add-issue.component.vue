<template>
    <div class="add-issue py-2">
        <card class="card p-4">
            <autosize-textarea class="textarea" v-model="name" :onEnter="submit" ref="textarea" />
        </card>
        <div>
            <button class="border mt-2 py-2 px-4 rounded text-grey-light" @click="submit">Add</button>
            <button class="border mt-2 py-2 px-4 rounded text-grey-light" @click="onCancel">Cancel</button>
        </div>
    </div>
</template>

<script>
import AutosizeTextarea from "./autosize-textarea.component";
import Card from "./card.component";
import { mapActions, mapState } from "vuex";

export default {
    props: ["category", "onCancel"],
    components: {
        AutosizeTextarea,
        Card
    },
    data() {
        return {
            name: ""
        };
    },
    mounted() {
        this.$refs.textarea.$el.focus();
    },
    methods: {
        async submit() {
            try {
                const payload = {
                    projectId: this.projectId,
                    projectCategoryId: this.projectCategoryId,
                    name: this.name
                };
                await this.addIssue(payload);
                this.reset();
            } catch (e) {
                // todo: show some toast/modal
                console.log(e);
            }
        },
        valid() {
            return this.name !== "";
        },
        reset() {
            this.name = "";
        },
        ...mapActions(["addIssue"])
    },
    computed: mapState({
        projectId(state) {
            return state.selectedProject.id;
        },
        projectCategoryId() {
            return this.category.id;
        }
    })
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.add-issue {
    display: flex;
    flex-direction: column;
}
.card {
    display: flex;
}
.textarea {
    color: $text-color;
    border: none;
    outline: none;
    flex: 1;
}
</style>
