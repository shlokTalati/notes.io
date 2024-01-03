<?php
//echo "This is UserServices.php";

require_once($_SERVER['DOCUMENT_ROOT'] . "/notes.io/config/Database.php");

class UserServices extends Database{

    
    //Function to check if the email already exists in the database
    public function checkEmail($email){

        $check_query = "SELECT * from user where email='$email'";
        $check_result = mysqli_query($this->connection, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    // Function to check if the phone number already exists in the database
    public function checkPhone($contactno){

        $check_query = "SELECT * from user where contact_no='$contactno'";
        $check_result = mysqli_query($this->connection, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    
    //Function to signup a new user
    public function signup($name, $dob, $contactno, $email, $password){
    
        if ($this->checkEmail($email) == true) {
            $_SESSION['signupStatus'] = false;
            header("Location: /notes.io/signup");
        } 
        else if ($this->checkPhone($contactno) == true) {
            $_SESSION['signupStatus'] = false;
            header("Location: /notes.io/signup");
        } 
        else {
            
            $signup_query = "INSERT INTO user(name, dob, contact_no, email, password) values ('$name', '$dob', '$contactno', '$email', '$password')";
            $signup_result = mysqli_query($this->connection, $signup_query);
            if ($signup_result == true) {
                $_SESSION['signupStatus'] = true;
                header("Location: /notes.io/login");
            }
    
        }
    }
    



    //Function to authenticate and login a user 
    public function login($email, $password){
        
        $login_query = "SELECT name, email from user where email='$email' and password = '$password'";
        $login_result = mysqli_query($this->connection, $login_query);
        if (mysqli_num_rows($login_result) > 0) {
            $user = mysqli_fetch_assoc($login_result);
            $_SESSION['loggedIn'] = true;
            $_SESSION['userName'] = $user['name']; 
            $_SESSION['userEmail'] = $user['email'];
            header("Location: /notes.io/notes");
        }
        else{
            header("Location: /notes.io/login");
        }
    }
    

    public function getUserDetails($email){
        $user_query = "SELECT * from user where email='$email'";
        $user_result = mysqli_query($this->connection, $user_query);
        if (mysqli_num_rows($user_result) > 0) {
            $user = mysqli_fetch_assoc($user_result);
            return $user;
        }
        else{
            return false;
        }
    }


    //Function to update user details
    public function updateUser($name, $dob, $contactno, $email, $password){
        $update_query = "UPDATE user SET name='$name', dob='$dob', contact_no='$contactno', password='$password' WHERE email='$email'";
        $update_result = mysqli_query($this->connection, $update_query);
        if ($update_result == true) {
            $updateStatus = true;
        }
        else{
            $updateStatus = false;
        }
        return $updateStatus;
    }


    public function logout(){
        session_unset();
        header("Location: /notes.io/login");
    
    }

}