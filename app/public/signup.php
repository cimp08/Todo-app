<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <!-- ERROR MESSAGE GET PRINTED AS ALERT -->
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
          echo '<div class="alert alert-danger mt-2" role="alert">Fill in all fields!</div>';
        } else if ($_GET['error'] == 'username') {
          echo '<div class="alert alert-danger mt-2" role="alert">Choose a proper username!</div>';
        } else if ($_GET['error'] == 'usernamelength') {
          echo '<div class="alert alert-danger mt-2" role="alert">Username must contain 4 letters!</div>';
        } else if ($_GET['error'] == 'email') {
          echo '<div class="alert alert-danger mt-2" role="alert">Choose a proper email!</div>';
        } else if ($_GET['error'] == 'passwordmatch') {
          echo '<div class="alert alert-danger mt-2" role="alert">Passwords doesn´t match!</div>';
        } else if ($_GET['error'] == 'passwordlength') {
          echo '<div class="alert alert-danger mt-2" role="alert">Password must contain 6 letters!</div>';
        } else if ($_GET['error'] == 'useroremailtaken') {
          echo '<div class="alert alert-danger mt-2" role="alert">Username or email already taken</div>';
        }
      } ?>

      <h2 class="display-6">SIGNUP</h2>
      <p>Dont have an account? Sign up here!</p>
      <form action="includes/signup.inc.php" method="post">
        <div class="mb-3">
          <input type="text" name="username" placeholder="Username" class="form-control" required>
        </div>
        <div class="mb-3">
          <input type="text" name="email" placeholder="E-mail" class="form-control">
        </div>
        <div class="mb-3">
          <input type="password" name="password" placeholder="Password" class="form-control" required>
        </div>
        <div class="mb-3">
          <input type="password" name="repeatpassword" placeholder="Repeat Password" class="form-control" required>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
          </div>
          <div class="col">
            <a href="login.php" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require 'includes/views/footer.php'; ?>