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
      axios(options)
        .then(response => { this.tasks = response.data })
        .catch(error => { console.error(error.message); })

    },

    completeTask(i) {
      this.completedTask.push(this.tasks[i])
      this.tasks.splice(i, 1);
    },

    toggleDoneTask(i) {
      this.tasks[i].done = this.tasks[i].done ? false : true; //toggle himself
      const data = { index: i }
      const options = this.composeOptions('toggle.php', 'POST', data)

      axios(options)
        .catch(error => { console.error(error.message); })
    },

    composeOptions(file, method, data) {
      return options = {
        url: this.api_url + file,
        method: method,
        headers: { 'Content-Type': 'multipart/form-data' },
        data: data
      }
    }
  },

  mounted() {
    const options = this.composeOptions('index.php', 'GET', '')
    axios(options)
      .then(response => { this.tasks = response.data })
      .catch(error => { console.error(error.message); })


  }
}).mount('#app')