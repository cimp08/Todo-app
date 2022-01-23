<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>
<?php include 'classes/todos.contr.classes.php'; ?>

<main>
    <section class="add-section">
        <h1>UPDATE TASK!</h1>
    
  <?php $editTask = $task->edit($_GET['edit']);?>

        <form action="includes/todos.inc.php" method="post">
            <input 
            class="add-section-input"
            type="text" 
            name="task" 
            placeholder="Enter a task"
            value="<?php echo $editTask; ?>"
            autocomplete="off"
            required
            >
            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
            <button class="btn btn-outline-primary btn-lg" name="update" type="submit"><ion-icon name="arrow-up-outline"></ion-icon></button>
        </form>
    </section>
</main>

<?php require 'includes/views/footer.php'; ?> 