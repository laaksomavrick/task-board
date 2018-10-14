import uuid from "uuid/v4";

export default {
    created() {
        this.uuid = uuid();
    }
};
