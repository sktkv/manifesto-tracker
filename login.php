<?php
session_start();
include "promise-db.php";
if (isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }


    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)){
        header("Location:login-page.php?error=User Name is required");
        exit();
    } 
    else if(empty($password)){
        header("Location:login-page.php?error=Password is required");
        exit();
    }
    else{ 
    $sql = "SELECT * FROM users_db WHERE user_name='$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $username && $row['password'] === $password){
                $SESSION['user_name'] = $row['user_name'];
                $SESSION['name'] = $row['name'];
                $SESSION['id'] = $row['id'];
                header("Location:promise-admin.html");
                exit();
            } else{
                header("Location:login-page.php?error=Incorrect Username or Password");
                exit();
        }}
        else{
            header("Location:login-page.php?error=Incorrect Username or Password");
            exit();

        }

    }
    
    
}else{
    header("Location:login-page.php");
    exit();
}