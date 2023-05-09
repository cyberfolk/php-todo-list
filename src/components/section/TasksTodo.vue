<script>
import { state } from "../../state.js";
import TaskAdd from "../item/TaskAdd.vue";
import axios from "axios";
export default {
    name: "TasksTodo",
    components: { TaskAdd, },
    data() { return { state, }; },
    methods: {
        deleteTask(i) {
            const data = { index: i, start_path: "tasksTodo.json" }
            const options = state.composeOptions('delete.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            state.fetchTodo()
            state.fetchDeleted()
        },

        completeTask(i) {
            const data = { index: i }
            const options = state.composeOptions('complete.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            state.fetchTodo()
            state.fetchDone()
        },
    },
    mounted() {
        state.fetchTodo()
    }
};

</script>
<template>
    <section id="tasks_todo" class="col-4">
        <h2 class="text-light text-center pb-1">Todo Tasks</h2>

        <ul v-if="state.tasksTodo.length" class="list-group mb-4">
            <li class="list-group-item fw-bold ps-2" v-for="(task, index) in state.tasksTodo" :class="{ completed: task.done }">
                <button @click="deleteTask(index)" class="bg-danger border-0 rounded py-1 px-2 me-2">
                    <i class="fa-solid fa-trash-can text-light"></i>
                </button>
                <button @click="completeTask(index)" class="bg-success border-0 rounded py-1 px-2">
                    <i class="fa-solid fa-check text-light"></i>
                </button>
                <span class="ms-2" role="button">{{ task.name }}</span>
            </li>
        </ul>

        <div class="alert alert-success " role="alert" v-else>
            <strong>Hai completato tutte le Task. Bravo.</strong>
        </div>

        <TaskAdd></TaskAdd>

    </section>
    <!-- /#tasks_todo -->
</template>

<style lang="scss" scoped>
.completed {
    text-decoration: line-through !important;
    text-decoration-color: red !important;
    text-decoration-thickness: 2px !important;
}
</style>
