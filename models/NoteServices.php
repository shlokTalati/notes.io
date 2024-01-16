<?php
require_once(__DIR__ . '/../config/Database.php');

class NoteServices extends Database
{
    public function insertNote($user_email, $title, $description)
    {
        $insert_query = "INSERT INTO note (user_email, title, description) values ('$user_email', '$title', '$description')";
        $insert_result = mysqli_query($this->connection, $insert_query);
        if ($insert_result == true) {
            header("Location: /notes.io/notes/insertNote");
        }
    }


    public function displayNotes($user_email)
    {

        $display_query = "SELECT id, title, description from note where user_email='$user_email'";
        $display_result = mysqli_query($this->connection, $display_query);

        if (mysqli_num_rows($display_result) > 0) {
            
            return $display_result;
        } else {
            return "";
        }

    }
    

    public function deleteNote($note_id)
    {

        $delete_query = "DELETE from note where id = '$note_id'";
        $delete_result = mysqli_query($this->connection, $delete_query);

        if ($delete_result == true) {
            header("Location: /notes.io/notes/deleteNote");
        } else {
            
            Header("Location: /notes.io/notes/deleteNoteFailure");
        }
    }

    public function updateNote($note_id, $note_title, $note_description)
    {
        $update_query = "UPDATE note SET title = '$note_title', description = '$note_description' WHERE id = '$note_id'";
        $update_result = mysqli_query($this->connection, $update_query);

        if ($update_result == true) {
            header("Location: /notes.io/notes/updateNote");
        } else {
            header("Location: /notes.io/notes/updateNoteFailure");
        }
    }
}
?>