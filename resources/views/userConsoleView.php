<br><br>

<?php

if (isset($updateStatus)) {

    if ($updateStatus == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your details have been updated successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Failed!</strong> Your details could not be updated. Please try again.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
}

?>

<h1 class="text-light">User Details</h1>

<form class="text-light mt-5 form-light" method="post" action="/notes.io/user/edit">

    <div class="mb-3">
        <label for="updateName" class="form-label">Name</label>
        <input type="text" class="form-control" id="updateName" name="updateName" aria-describedby="updateName" value="<?php echo $_SESSION['userName']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="updateEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="updateEmail" name="updateEmail" aria-describedby="updateEmail" value="<?php echo $_SESSION['userEmail']; ?>" readonly>
        <div id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="updatePassword" class="form-label">Password</label>
        <input type="text" class="form-control" id="updatePassword" name="updatePassword" required>
        <div id="passwordHelpBlock" class="form-text text-light">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
            special characters, or emoji.
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-outline-warning">Update Details</button>
</form>