const { createApp } = Vue
createApp({
  data() {
    return {
      tasks: null,
      api_url: 'app/Http/Controllers/TasksController/index.php',
      new_task: '',
      completedTask: [],
    }
  },
  methods: {

    add_task() {

      // axios POST request
      const options = {
        url: 'app/Http/Controllers/TasksController/store.php',
        method: 'POST',
        headers: {
          'Content-Type': 'multipart/form-data'
        },
        data: {
          new_task: {
            "name": this.new_task,
            "completed": ""
          }
        }
      }

      axios(options)
        .then(response => {
          console.log(response);
          this.tasks = response.data
        })
        .catch(error => { console.error(error.message); })

    },
    completeTask(i) {
      this.completedTask.push(this.tasks[i])
      this.tasks.splice(i, 1);
    },
    toggleDoneTask(i) {
      if (this.tasks[i].done === false) {
        this.tasks[i].done = true
      } else {
        this.tasks[i].done = false
      }
    }
  },
  mounted() {

    axios
      .get(this.api_url)
      .then(response => {
        console.log(response);
        this.tasks = response.data
      })
      .catch(error => {
        console.error(error.message);
      })


  }
}).mount('#app')