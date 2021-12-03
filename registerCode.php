<?php
    
    //database connection
$conn = mysqli_connect("localhost", "root", "", "narmin34");
    $errors = array();
    $success = array();

    //if register button is clicked
if(isset($_POST['register'])){
    
    //find this variables
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $code = $_POST['password'];
    $confirm = $_POST['confirmpassword'];
    
    //trim input tags
    
    $full_name = trim($full_name);
    $email = trim($email);
    $password = trim($code);
    $confirm = trim($confirm);
    $role = "user";
    $reg_date = date("Y-m-d H:i:s", time());    

    //if any of the fields are empty
    if( $full_name === "" || $email === "" || $password === "" || $confirm === "") {
         $errors['fields'] = "All fields are Required";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = "Email is invalid";
    }
    elseif(strlen($password) < 8) {
        $errors['password'] = "Password too short";
    }
    elseif($password != $confirm) {
        $errors['passwordf'] = "Passwords don't match";
    }

    else {
        $query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($query) > 0){
           $errors['pass'] = "Email Exists";
        }
        else{
            $password = password_hash($code, PASSWORD_DEFAULT);
             $query = mysqli_query($conn, "INSERT INTO users (names, email, role, password, registered_on) VALUES('$full_name','$email','$role','$password','$reg_date')");
            if($query){
                //$success['confirm'] = "You are now registered <a href='signin.php'>Login Here</a>";
                $qry = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                if(mysqli_num_rows($qry) > 0){
                $row = mysqli_fetch_array($qry);
                $id = $row['user_id'];
                $fullname = $row['names'];
                $pwd = $row['password'];
                $email = $row['email'];
                $role = $row['role'];
                $code = $_POST['password'];
                
                if(password_verify($code, $pwd)){
                    if($qry && $role === "admin"){
                        $_SESSION['user'] = $id;
                        $_SESSION['fullname'] = $fullname;
                        $_SESSION['email'] = $email;
                        $_SESSION['role'] = $role;
                        header('location:admin/index.php');
                    }
                    if($qry && $role === "user"){
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
            }else {
              $errors['pass'] = "Error Registering";
            }
        }
    }

}
?>