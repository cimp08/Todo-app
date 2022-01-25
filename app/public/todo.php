<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>
<?php include 'classes/todos.contr.classes.php'; ?>

<main>
  <section>
    <div class="row text-center mb-3">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <?php
          if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>" role="alert">
              <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
              ?>
            </div>
          <?php endif; ?>

          <h1 class="text-uppercase">Todo list by <?php echo $_SESSION['user_username']; ?></h1>
          <form action="includes/todos.inc.php" method="post">
            <div class="input-group mb-3">
              <input class="form-control" id="taskinput" type="text" name="task" placeholder="Enter a task" autocomplete="off" required>
              <button class="btn btn-outline-success btn-lg" name="submit_create" type="submit">
                <ion-icon name="add-outline"></ion-icon>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section>
    <?php $rows = $task->setTodos(); ?>

    <?php if (!empty($rows->rowCount())) : ?>
      <?php foreach ($rows as $row) : ?>
        <div class="row text-center mt-2">
          <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light border-primary">
              <ul class="list-unstyled">
                <li>
                  <?php if (!$row['completed']) : ?>
                    <a class="btn btn-outline-secondary float-start me-3" href="includes/todos.inc.php?as=notcompleted&id=<?php echo $row['todosId'] ?>">
                      <ion-icon name="checkmark-outline"></ion-icon>
                    </a>
                  <?php else : ?>
                    <a class="btn btn-outline-secondary float-start me-3" href="includes/todos.inc.php?as=completed&id=<?php echo $row['todosId'] ?>">
                      <ion-icon name="checkmark-outline"></ion-icon>
                    </a>
                  <?php endif; ?>
                  <h2 class="task<?php echo $row['completed'] ? ' text-decoration-line-through' : '' ?>"><?php echo $row['task']; ?></h2>
                  <a class="btn btn-outline-primary float-end" href="todoupdate.php?edit=<?php echo $row['todosId'] ?>">
                    <ion-icon name="create-outline"></ion-icon>
                  </a>
                  <button type="button" class="btn btn-outline-danger float-end me-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <ion-icon name="close-outline"></ion-icon>
                  </button>
                  <p class="created">Created by <?php echo $row['users_username'] ?> on <?php echo $row['created'] ?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card card-body bg-light mt-2 text-center">
            <ion-icon class="calendar mx-auto" name="calendar-clear-outline"></ion-icon>
            <p>No tasks added </p>
            <a class="link-success" href="#taskinput">Add a task +</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>
</main>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Deleting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete the task?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="includes/todos.inc.php?delete=<?php echo $row['todosId'] ?>" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<?php require 'includes/views/footer.php'; ?>