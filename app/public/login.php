<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?> 

<div class="container">
  <?php
  if(isset($_GET['error'])){
    if($_GET['error'] == 'none') {
      echo '<div class="alert alert-success mt-2" role="alert">You are registered, please login!</div>';
    }
    else if($_GET['error'] == 'emptyinput') {
      echo '<div class="alert alert-danger mt-2" role="alert">Fill in all fields!</div>';
    }
    else if($_GET['error'] == 'stmtfailed') {
      echo '<div class="alert alert-danger mt-2" role="alert">Something went wrong!</div>';
    }
    else if($_GET['error'] == 'usersnotfound') {
      echo '<div class="alert alert-danger mt-2" role="alert">User not found, try again!</div>';
    }
    else if($_GET['error'] == 'wrongpassword') {
      echo '<div class="alert alert-danger mt-2" role="alert">Wrong password, try again!</div>';
    }
    else if($_GET['error'] == 'notloggedin') {
      echo '<div class="alert alert-danger mt-2" role="alert">Please login</div>';
    }
  }
  ?>
        <h2 class="display-6 mt-4 mb-4">LOGIN</h2>
        <p>Have an account? Login here!</p>
        <form action="includes/login.inc.php" method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Login</button>
        </form>
    </div>

<?php require 'includes/views/footer.php'; ?> 