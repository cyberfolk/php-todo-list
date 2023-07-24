import { reactive } from 'vue'
import axios from "axios";

export const state = reactive({
    tasksTodo: [],
    tasksDone: [],
    tasksDeleted: [],
    api_url: 'http://localhost:8888/5-php/php-todolist/2-todolist-cors/todolist-php/app/Http/Controllers/TasksController/',
    //deletedTasks: [],

    composeOptions(file, method, data) {
        return {
            url: this.api_url + file,
            method: method,
            headers: { 'Content-Type': 'multipart/form-data' },
            data: data
        }
    },
    async fetchTodo() {
        const response = await axios.get(this.api_url + 'get/getTodo.php')
        this.tasksTodo = response.data;
    },
    async fetchDone() {
        const response = await axios.get(this.api_url + 'get/getDone.php')
        this.tasksDone = response.data;
    },
    async fetchDeleted() {
        const response = await axios.get(this.api_url + 'get/getDeleted.php')
        this.tasksDeleted = response.data;
    }
}
);