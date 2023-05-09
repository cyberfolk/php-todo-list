<script>
import { state } from "../../state.js";
export default {
    name: "TasksDone",
    data() { return { state, }; },
    mounted() { state.fetchDone() }
};
</script>

<template>
    <!-- Not yet implemented -->
    <section id="tasks_deleted" class="col-4">
        <h2 class="text-light text-center pb-1">Done Tasks</h2>
        <ul v-if="state.tasksDone.length" class="list-group">
            <li v-for="(task, index) in state.tasksDone" class="list-group-item fw-bold">
                <button @click="deleteTask(index)" class="bg-danger border-0 rounded py-1 px-2 me-2">
                    <i class="fa-solid fa-trash-can text-light"></i>
                </button>
                <button @click="completeTask(index)" class="bg-success border-0 rounded py-1 px-2">
                    <i class="fa-solid fa-check text-light"></i>
                </button>
                <span class="ms-2" role="button">{{ task.name }}</span>
            </li>
        </ul>
        <div class="alert alert-danger " role="alert" v-else>
            <strong>Al momento non hai completato nessuna Task</strong>
        </div>
    </section>
    <!-- /#tasks_deleted -->
</template>

<style lang="scss" scoped></style>
