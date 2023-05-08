const { createApp } = Vue
createApp({
  data() {
    return {
      tasks: [],
      api_url: 'app/Http/Controllers/TasksController/',
      new_task: '',
      deletedTasks: [],
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
      this.deletedTasks.push(this.tasks[i])
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