<script>
import axios from "axios";
export default {
    name: "TasksTodo",
    data() {
        return {
            tasks: [],
            api_url: 'http://localhost:8888/4-php/l-66-persistenza/php-todo-list-json/app/Http/Controllers/TasksController/',
            new_task: '',
            //deletedTasks: [],
        }
    },
    methods: {
        add_task() {
            const data = {
                new_task:
                {
                    "name": this.new_task,
                    "done": ""
                }
            }
            const options = this.composeOptions('store.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            this.new_task = ""
            this.fetchData()
        },

        deleteTask(i) {
            //this.deletedTasks.push(this.tasks[i])
            const data = { index: i }
            const options = this.composeOptions('delete.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            this.fetchData()
        },

        toggleDoneTask(i) {
            const data = { index: i }
            const options = this.composeOptions('toggleDone.php', 'POST', data)
            axios(options).catch(error => { console.error(error.message); })
            this.fetchData()
        },

        composeOptions(file, method, data) {
            return {
                url: this.api_url + file,
                method: method,
                headers: { 'Content-Type': 'multipart/form-data' },
                data: data
            }
        },
        fetchData() {
            const options = this.composeOptions('index.php', 'GET', '')
            axios(options)
                .then(response => { this.tasks = response.data })
                .catch(error => { console.error(error.message); })
        }
    },
    mounted() {
        this.fetchData()
    }
};
</script>
<template>
    <div id="tasks_todo" class="col-4">
        <h2 class="text-light text-center pb-1">Tasks</h2>

        <div class="card shadow mb-4" v-if="tasks != null">
            <!-- /.add_task -->
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-start align-items-center fw-bold" v-for="(task, index) in tasks" :class="{ completed: task.done }">
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

        <div class="add_task input-group mb-3">
            <input type="text" name="new_task" id="new_task" class="form-control " v-model.trim="new_task" @keyup.enter="add_task" placeholder="Type a task here">
            <button class="input-group-text" @click="add_task">Add</button>
        </div>
        <!-- /.add_task -->
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
