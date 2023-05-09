<script>
import { state } from "../../state.js";
import TaskAdd from "../item/TaskAdd.vue";
import axios from "axios";
export default {
    name: "TasksTodo",
    components: { TaskAdd, },
    data() {
        return { state, };
    },
    methods: {
        deleteTask(i) {
            //this.deletedTasks.push(this.tasks[i])
            const data = { index: i }
            const options = state.composeOptions('delete.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            state.fetchData()
        },

        toggleDoneTask(i) {
            const data = { index: i }
            const options = state.composeOptions('toggleDone.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            state.fetchData()
        },
    },
    mounted() {
        state.fetchData()
    }
};
</script>
<template>
    <div id="tasks_todo" class="col-4">
        <h2 class="text-light text-center pb-1">Tasks</h2>

        <div class="card shadow mb-4" v-if="state.tasks.length">
            <!-- /.add_task -->
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-start align-items-center fw-bold" v-for="(task, index) in state.tasks" :class="{ completed: task.done }">
                    <button @click="deleteTask(index)" class="bg-danger border-0 rounded py-1 px-2">
                        <i class="fa-solid fa-trash-can text-light"></i>
                    </button>
                    <div class="ms-3" @click="toggleDoneTask(index)" role="button">{{ task.name }}</div>
                </li>
            </ul>
        </div>
        <!-- /.card -->
        <div class="alert alert-success " role="alert" v-else>
            <strong>Hai completato tutte le Task. Bravo.</strong>
        </div>

        <TaskAdd></TaskAdd>
    </div>
    <!-- /#tasks_todo -->
</template>

<style lang="scss" scoped>
.completed {
    text-decoration: line-through !important;
    text-decoration-color: red !important;
    text-decoration-thickness: 2px !important;
}
</style>
