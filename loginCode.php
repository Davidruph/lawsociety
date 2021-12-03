<?php

$conn = mysqli_connect("localhost", "root", "", "narmin34");
$errors = array();

if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $password = $_POST['password'];
     
     $email = trim($email);
     $password = trim($password);
   
    if($email === "") {
        $errors['email'] = "Email is required";
    }
    if($password === "") {
        $errors['password'] = "Password is required";
    }
    elseif(strlen($password) < 6) {
        $errors['password'] = "password too short";
    }
    else{
  
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            $id = $row['user_id'];
            $fullname = $row['names'];
            $pwd = $row['password'];
            $email = $row['email'];
            $role = $row['role'];
            
            if(password_verify($password, $pwd)){
                
                if($query && $role === "admin"){
                    $_SESSION['user'] = $id;
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    header('location:admin/index.php');
                }
                if($query && $role === "user"){
                    $_SESSION['user'] = $id;
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    header('location:index.php');
                }
                
            }else {
                    $errors['username'] = "Incorrect Password";

            } 
        }else {
                    $errors['username'] = "User not found";

            }

    }

}

?>