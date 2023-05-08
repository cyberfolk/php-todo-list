<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . "/assets/head.php" ?>

<body class="bg-primary">


  <div id='app'>
    <?php include __DIR__ . "/assets/header.php" ?>
    <main id="app_main">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <h2 class="text-light text-center">Tasks</h2>
            <div class="card shadow mb-4">
              <!-- /.add_task -->
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between" v-for="(task, index) in tasks" :class="{completed : task.done}">
                  <div @click="toggleDoneTask(index)" role="button">{{task.name}}</div>
                  <button @click="completeTask(index)" class="bg-danger border-0 rounded py-1 px-2">
                    <i class="fa-solid fa-trash-can text-light"></i>
                  </button>
                </li>
              </ul>
            </div>
            <!-- /.card -->

            <form class="add_task">
              <div class="input-group mb-3">
                <input type="text" name="new_task" id="new_task" class="form-control " v-model="new_task" @keyup.enter="add_task" placeholder="Type a task here">
                <button class="input-group-text" @click="add_task">Add</button>
              </div>
            </form>
            <!-- /.add_task -->
          </div>
          <!-- /.col-3 -->


          <div class="col-3">
            <div class="completedTask mt-3 mt-lg-0">
              <h2 class="text-light text-center">Completed Tasks</h2>
              <ul v-if="completedTask.length > 0" class="list-group">
                <li v-for="(task, index) in completedTask" class="list-group-item">{{task.name}}</li>
              </ul>
              <div class="alert alert-danger " role="alert" v-else>
                <strong>Al momento non hai completato nessuna Task</strong>
              </div>
            </div>
            <!-- /.completedTask -->
          </div>
          <!-- /.col-3 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </main>
    <!-- /#app_main -->
  </div>
  <!-- /#app -->



  <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
  <!-- Development only cdn, disable in production -->
  <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
  <script src='./app.js'></script>
</body>

</html>