<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . "/assets/head.php" ?>

<body class="bg-primary">


  <div id='app'>
    <?php include __DIR__ . "/assets/header.php" ?>
    <main id="app_main">
      <div class="container">
        <div class="row justify-content-center g-5">
          <div class="col-4">
            <h2 class="text-light text-center pb-1">Tasks</h2>

            <div class="card shadow mb-4" v-if="tasks.length > 0">
              <!-- /.add_task -->
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-start align-items-center fw-bold" v-for="(task, index) in tasks" :class="{completed : task.done}">
                  <button @click="completeTask(index)" class="bg-danger border-0 rounded py-1 px-2">
                    <i class="fa-solid fa-trash-can text-light"></i>
                  </button>
                  <div class="ms-3" @click="toggleDoneTask(index)" role="button">{{task.name}}</div>
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
          <!-- /.col-4 -->


          <div class="col-4">
            <div class="completedTask mt-3 mt-lg-0">
              <h2 class="text-light text-center pb-1">Completed Tasks</h2>
              <ul v-if="completedTask.length > 0" class="list-group">
                <li v-for="(task, index) in completedTask" class="list-group-item fw-bold">{{task.name}}</li>
              </ul>
              <div class="alert alert-danger " role="alert" v-else>
                <strong>Al momento non hai completato nessuna Task</strong>
              </div>
              <div class="text-end"> <small class="text-light">NB. Questi valori non sono persistenti</small>
              </div>
            </div>
            <!-- /.completedTask -->
          </div>
          <!-- /.col-4 -->
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