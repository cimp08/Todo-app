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
        <h1>TO DO LIST!</h1>
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
                    <a class="btn btn-outline-danger float-end me-1" href="includes/todos.inc.php?delete=<?php echo $row['todosId']?>" onclick="return checkDelete()"><ion-icon name="close-outline"></ion-icon></a> 
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
<?php require 'includes/views/footer.php'; ?> 