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
            <li v-for="(task, index) in state.tasksDone" class="list-group-item fw-bold">{{ task.name }}</li>
        </ul>
        <div class="alert alert-danger " role="alert" v-else>
            <strong>Al momento non hai completato nessuna Task</strong>
        </div>
        <div class="text-end"><small class="text-light">NB. Questi valori non sono persistenti</small></div>
        <div class="text-end"><small class="text-light">NB. Funzionalità non ancora implementata</small></div>
    </section>
    <!-- /#tasks_deleted -->
</template>

<style lang="scss" scoped></style>
