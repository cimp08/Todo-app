<?php
session_start();

if(isset($_SESSION['user_id'])) {
    // Head back to front page
    header('location: ../todo.php?error=none');
} else {
    header('location: ../login.php?error=notloggedin');
}