<main class="container">
    <!-- Form for Inserting Notes in Database -->
    <div class="container mt-5">

        <h1 class="text-light pt-4"><?php echo $_SESSION['userName'] . "'s Notes" ?></h1>
        <br>
        <form action="/notes.io/notes/insertNote" method="post">

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="noteTitle" placeholder="Title" name="noteTitle" required>
                <label for="noteTitle">Title</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="noteDescription" placeholder="Description" name="noteDescription" required>
                <label for="noteDescription">Description</label>
            </div>
            <br><br>
            <input type="submit" class="btn btn-outline-warning" value="Add Note">


        </form>
    </div>

    <!-- Table for Displaying Data from Database  -->
 
    <div class="container mt-5">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

  <?php
   
   
  $i = 0;
  if ($noteData != "") {
    
      while ($note = mysqli_fetch_assoc($noteData)) {

          $i++; //This Counter is used for the sno. column in the table
  
          echo "<tr>";
          echo "<th scope='row'>$i</th>";
          echo "<td>" . $note['title'] . "</td>";
          echo "<td>" . $note['description'] . "</td>";
          echo "<td>";
          echo "<a class='btn btn-sm btn-outline-danger mx-2' href='/notes.io/notes/deleteNote/" . $note['id'] . "' id='deleteNoteBtn'>Delete</a>";

          echo "<a class='btn btn-sm btn-outline-warning mx-2' onclick='updateNote(".($i-1).")' id='updateNoteBtn'>Update</a>";

          echo "</td>";
          echo "</tr>";

      }
  }

  ?>


   
  </tbody>
</table>
</div>

<!-- Modal for Note Updation -->
<!-- Modal for Note Updation -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post" action="/notes.io/notes/updateNote">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">

          <!-- Hidden ID Tag for PHP  -->
            <input type="text" class="form-control d-none" id="updateId" name="updateId">

            <label for="updateTitle" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="updateTitle" name="updateTitle">
          </div>
          <div class="mb-3">
            <label for="updateDescription" class="col-form-label">Description</label>
            <textarea class="form-control" id="updateDescription" name="updateDescription"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary">
        </div>
      </div>
    </div>
  </form>
</div>
</main>

<!-- Hidden Variable for Storing PHP Data in Javascript -->
<!-- Hidden Variable for Storing PHP Data in Javascript -->
<?php
    
    $i = 0;
    mysqli_data_seek($noteData, 0);
    if ($noteData != "") {

    $tempData = json_encode(mysqli_fetch_all($noteData));
    echo "<span id = 'tempDataVariable' class='d-none' >". $tempData . "</span>";
    }  
    ?>