<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>
<?php include 'classes/todos.contr.classes.php'; ?>

<main>
    <section>
        <div class="row text-center">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h1>UPDATE TASK!</h1>
    
                        <?php $editTask = $task->edit($_GET['edit']);?>

                    <form action="includes/todos.inc.php" method="post">
                        <div class="input-group mb-3">
                            <input 
                            class="form-control"
                            type="text" 
                            name="task" 
                            placeholder="Enter a task"
                            value="<?php echo $editTask; ?>"
                            autocomplete="off"
                            required>
                            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                            <button class="btn btn-outline-primary btn-lg" name="update" type="submit"><ion-icon name="arrow-up-outline"></ion-icon></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require 'includes/views/footer.php'; ?> 