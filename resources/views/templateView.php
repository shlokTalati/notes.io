<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes.io</title>

  <!-- Styles -->
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/css/styles.bundle.php");  ?>
</head>

<body class="bg-light" style="min-height: 100vh">

  <!-- Header -->
  <?php require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/components/header.php");  ?>

  <!-- Basically, this main tag renders the entire Main Views of different pages based on the request URI. -->
  <main class="container">
    <?php require($viewPath); ?>
  </main>

  <!-- Footer -->
  <?php require($_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/components/footer.php");  ?>

  <!-- Scripts -->
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/resources/js/scripts.bundle.php");  ?>
  
  <?php 
  
  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {

    echo "<script> loggedInStatus(true); </script>";
}
else{
    echo "<script> loggedInStatus(false); </script>";
}

  ?>
</body>

</html>