import { reactive } from 'vue'
import axios from "axios";

export const state = reactive({
    tasksTodo: [],
    tasksDone: [],
    tasksDeleted: [],
    api_url: 'http://localhost:8888/4-php/l-66-persistenza/php-todo-list-json-php/app/Http/Controllers/TasksController/',
    //deletedTasks: [],

    composeOptions(file, method, data) {
        return {
            url: this.api_url + file,
            method: method,
            headers: { 'Content-Type': 'multipart/form-data' },
            data: data
        }
    },
    fetchTodo() {
        const options = this.composeOptions('get/getTodo.php', 'GET', '')
        axios(options)
            .then(response => { this.tasksTodo = response.data })
            .catch(error => { console.error(error.message); })
    },
    fetchDone() {
        const options = this.composeOptions('get/getDone.php', 'GET', '')
        axios(options)
            .then(response => { this.tasksDone = response.data })
            .catch(error => { console.error(error.message); })
    },
    fetchDeleted() {
        const options = this.composeOptions('get/getDeleted.php', 'GET', '')
        axios(options)
            .then(response => { this.tasksDeleted = response.data })
            .catch(error => { console.error(error.message); })
    }
}
);