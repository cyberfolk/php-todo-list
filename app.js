const { createApp } = Vue
createApp({
  data() {
    return {
      tasks: null,
      api_url: 'app/Http/Controllers/TasksController/',
      new_task: '',
      completedTask: [],
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
      this.fetchData()
    },

    completeTask(i) {
      this.completedTask.push(this.tasks[i])
      this.tasks.splice(i, 1);
      const data = { index: i }
      const options = this.composeOptions('complete.php', 'POST', data)
      axios(options)
        .catch(error => { console.error(error.message); })
    },

    toggleDoneTask(i) {
      const data = { index: i }
      const options = this.composeOptions('toggle.php', 'POST', data)
      axios(options).catch(error => { console.error(error.message); })
      this.fetchData()
    },

    composeOptions(file, method, data) {
      return options = {
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
}).mount('#app')