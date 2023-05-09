<script>
import TasksTodo from "./section/TasksTodo.vue";
import TasksDeleted from "./section/TasksDeleted.vue";
export default {
    name: "SiteMain",
    components: {
        TasksTodo,
        TasksDeleted,
    }
};
</script>
<template>
    <main id="app_main">
        <div class="container">
            <div class="row justify-content-center g-5">
                <TasksTodo></TasksTodo>
                <TasksDeleted></TasksDeleted>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </main>
    <!-- /#app_main -->
</template>

<style lang="scss" scoped></style>
