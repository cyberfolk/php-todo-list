<script>
import { state } from "../../state.js";
import axios from "axios";
export default {
    name: "TaskAdd",

    data() {
        return {
            state,
            new_task: '',
        }
    },

    methods: {
        add_task() {
            const data = { new_task: this.new_task }
            const options = state.composeOptions('store.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            this.new_task = ""
            state.fetchData()
        },
    }
};

</script>
<template>
    <div id="add_task">
        <div class="input-group mb-3">
            <input type="text" name="new_task" id="new_task" class="form-control " v-model.trim="new_task" @keyup.enter="add_task" placeholder="Type a task here">
            <button class="input-group-text" @click="add_task">Add</button>
        </div>
    </div>
    <!-- /#add_task -->
</template>

<style lang="scss" scoped></style>
