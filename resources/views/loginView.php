<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes.io</title>
  <?php require_once("resources/css/styles.bundle.php"); ?>
</head>

<body class="bg-dark">

  <?php
  require(__DIR__ .  "/../components/header.php");
  ?>


  <!-- Login Container -->
  <!-- Login Container -->
  <div class="container mt-5 pt-5" id="loginContainer">
    <div class="container px-5">
      <h1 class="text-light">Login</h1>
      <br><br>
      <form action="process.php" method="get">

        <div class="form-floating mb-4">
          <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com" name="loginEmail" required>
          <label for="loginEmail">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="loginPassword" required>
          <label for="loginPass">Password</label>
        </div>
        <br><br>
        <input type="submit" class="btn btn-outline-light" value="Login">


      </form>
    </div>
  </div>


  <!-- Signup Container -->
  <!-- Signup Container -->
  <div class="container mt-5 pt-5 d-none" id="signupContainer">
    <div class="container px-5">
      <h1 class="text-light">Sign Up</h1>
      <br><br>
      <form action="process.php" method="get">

        <div class="form-floating mb-4">
          <input type="text" class="form-control" id="signupName" placeholder="Name" name="signupName" required>
          <label for="signupName">Name</label>
        </div>

        <div class="form-floating mb-4">
          <input type="email" class="form-control" id="signupEmail" placeholder="name@example.com" name="signupEmail" required>
          <label for="signupEmail">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="signupPass" placeholder="Password" name="signupPass" required>
          <label for="signupPass">Password</label>
        </div>
        <br><br>
        <input type="submit" class="btn btn-outline-light" value="Sign Up">


      </form>
    </div>
  </div>


  <?php require_once("resources/js/scripts.bundle.php"); ?>
</body>

</html>