<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?> 

<main>
<section class="add-section">
    <h1>TO DO LIST!</h1>
    <form action="#" method="post">
        <input class="add-section-input" type="text" name="task" placeholder="Enter a task" autocomplete="off" required>
        <button class="btn-add" name="submit" type="submit"><ion-icon name="add-outline"></ion-icon></button>
    </form>
<?php require 'includes/views/footer.php'; ?> 