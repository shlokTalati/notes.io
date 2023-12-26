<?php
//echo "This is UserServices.php";

require(__DIR__ . '/../config/Database.php');

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


    
    //Function to signup a new user
    public function signup($name, $email, $password){
    
        if ($this->checkEmail($email) == true) {
            $_SESSION['signupStatus'] = false;
            header("Location: /notes.io/signup");
        } 
        else {
            
            $signup_query = "INSERT INTO user(name, email, password) values ('$name', '$email', '$password')";
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
    


    public function logout(){
        session_unset();
        header("Location: /notes.io/login");
    
    }

}