<template>
    <card class="issue p-4" @click.native="openIssueDetailsModal">
        <div class="name mb-2">
            {{ name }}
        </div>
        <div v-if="tag" class="tag py-1 px-2 rounded font-semibold" :class="tagBackground">
            {{ tag }}
        </div>
    </card>
</template>

<script>
import Card from './card.component';
import { getClassForColour } from '../utils/colourable.utils';
import { mapActions } from 'vuex';
export default {
    props: ['issue'],
    components: {
        Card
    },
    methods: {
        openIssueDetailsModal() {
            const data = {
                issue: this.issue
            };
            this.toggleIssueDetailsModal(data);
        },
        ...mapActions(['toggleIssueDetailsModal'])
    },
    computed: {
        name() {
            return this.issue.name;
        },
        tag() {
            return this.issue.tag ? this.issue.tag.name : null;
        },
        tagBackground() {
            return getClassForColour(this.issue.tag.colour);
        }
    }
};
</script>

<style lang="scss" scoped>
.issue {
    cursor: pointer;
    display: flex;
    flex-direction: column;
}
.tag {
    width: fit-content;
    color: white;
}
</style>
