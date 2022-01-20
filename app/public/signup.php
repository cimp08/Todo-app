<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?> 

<div class="container">
  <?php 
    if(isset($_GET['error'])){
      if($_GET['error'] == 'emptyinput') {
        echo '<div class="alert alert-danger mt-2" role="alert">Fill in all fields!</div>';
      } 
      else if($_GET['error'] == 'username') {
        echo '<div class="alert alert-danger mt-2" role="alert">Choose a proper username!</div>';
      }
      else if($_GET['error'] == 'email') {
        echo '<div class="alert alert-danger mt-2" role="alert">Choose a proper email!</div>';
      }
      else if($_GET['error'] == 'passwordmatch') {
        echo '<div class="alert alert-danger mt-2" role="alert">Passwords doesn´t match!</div>';
      }
      else if($_GET['error'] == 'useroremailtaken') {
        echo '<div class="alert alert-danger mt-2" role="alert">Username already taken</div>';
      }
    }
    ?>  
    <h2 class="display-6 mt-4 mb-4">SIGNUP</h2>
    <p>Dont have an account? Sign up here!</p>
    <form action="includes/signup.inc.php" method="post">
      <div class="mb-3">
        <input type="text" name="username" placeholder="Username" class="form-control" required>
        <div id="emailHelp" class="form-text">*Require</div>
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
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>      
</div>



<?php require 'includes/views/footer.php'; ?> 

        <!-- <div>
          <h4>Sign Up!</h4>
          <p>Dont have an account? Sign up here!</p>
          <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input
              type="password"
              name="repeatpassword"
              placeholder="Repeat Password"
            />
            <input type="text" name="email" placeholder="E-mail" />
            <button type="submit" name="submit">Sign Up</button>
          </form>
        </div> -->