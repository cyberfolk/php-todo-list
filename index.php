<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Tasks List</title>
  <link href='./style.css' rel='stylesheet'>
</head>

<body>
  <div id='app'>
    <h1>Tasker</h1>


    <div class="add_task">
      <input type="text" v-model="new_task" @keyup.enter="add_task" placeholder="Type a task here">
    </div>


    <ul>
      <li v-for="task in tasks">
        {{task}}
      </li>
    </ul>

  </div>

  <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
  <!-- Development only cdn, disable in production -->
  <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
  <script src='./app.js'></script>
</body>

</html>