<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>     
    
    <main>
      <section class="signup-login">
        <div>
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
        </div>
        <div>
          <h4>Login</h4>
          <p>Have an account? Login here!</p>
          <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit" name="submit">Login</button>
          </form>
        </div>
      </section>
    </main>
<?php require 'includes/views/footer.php'; ?>  
