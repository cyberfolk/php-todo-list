<script>
export default {
    name: "TasksDeleted",
};
</script>

<template>
    <!-- Not yet implemented -->
    <div id="tasks_deleted" class="col-4">
        <h2 class="text-light text-center pb-1">Completed Tasks</h2>
        <ul v-if="deletedTasks != 0" class="list-group">
            <li v-for="(task, index) in deletedTasks" class="list-group-item fw-bold">{{ task.name }}</li>
        </ul>
        <div class="alert alert-danger " role="alert" v-else>
            <strong>Al momento non hai completato nessuna Task</strong>
        </div>
        <div class="text-end"><small class="text-light">NB. Questi valori non sono persistenti</small></div>
        <div class="text-end"><small class="text-light">NB. Funzionalità non ancora implementata</small></div>
    </div>
    <!-- /#tasks_deleted -->
</template>

<style lang="scss" scoped></style>
