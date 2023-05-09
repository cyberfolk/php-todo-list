import { reactive } from 'vue'
import axios from "axios";

export const state = reactive({
    tasks: [],
    api_url: 'http://localhost:8888/4-php/l-66-persistenza/php-todo-list-json/app/Http/Controllers/TasksController/',
    //deletedTasks: [],

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
}
);