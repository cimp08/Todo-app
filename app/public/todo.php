<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>
<?php include 'classes/todos.contr.classes.php';?>

<?php
        if (isset($_SESSION['message'])):?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']?>" role="alert">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);   
            ?>
        </div>
        <?php endif;?>

<main>
    <section class="add-section">
        <h1 class="text-uppercase">Todo list by <?php echo $_SESSION['user_username'];?></h1>
        <form action="includes/todos.inc.php" method="post">
        <input
        id="taskinput"
        class="add-section-input"
        type="text" 
        name="task" 
        placeholder="Enter a task"
        autocomplete="off"
        required>
        <button class="btn btn-outline-success btn-lg" name="submit_create" type="submit"><ion-icon name="add-outline"></ion-icon></button>
        </form>
    </section>
    
    
    <section class="show-section">
        <?php $rows = $task->setTodos();?>

        <?php if(!empty($rows->rowCount())) : ?>
        <ul>
            <?php foreach($rows as $row): ?>
                <li class="show-section-items">
                    <?php if (!$row['completed']):?>
                    <a class="btn btn-outline-secondary float-start me-3" href="includes/todos.inc.php?as=notcompleted&id=<?php echo $row['todosId']?>"><ion-icon name="checkmark-outline"></ion-icon></a>
                    <?php else: ?>
                    <a class="btn btn-outline-secondary float-start me-3" href="includes/todos.inc.php?as=completed&id=<?php echo $row['todosId']?>"><ion-icon name="checkmark-outline"></ion-icon></a>
                    <?php endif;?>
                    <h2 class="task<?php echo $row['completed'] ? ' text-decoration-line-through' : '' ?>"><?php echo $row['task'];?></h2>
                    <a class="btn btn-outline-primary float-end" href="todoupdate.php?edit=<?php echo $row['todosId']?>"><ion-icon name="create-outline"></ion-icon></a>
                    <button type="button" class="btn btn-outline-danger float-end me-1" data-bs-toggle="modal" data-bs-target="#deleteModal"><ion-icon name="close-outline"></ion-icon></button>
                    <p class="created">Created by <?php echo $row['users_username']?> on <?php echo $row['created']?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <div class="show-section-items center">
            <ion-icon class="calendar" name="calendar-clear-outline"></ion-icon>
            <p class="notask">No tasks added </p>
            <a class="add-link" href="#taskinput">Add a task <span class="add-plus">+</span></a>
        </div>
        <?php endif;?>
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
        <a href="includes/todos.inc.php?delete=<?php echo $row['todosId']?>" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>






<?php require 'includes/views/footer.php'; ?> 