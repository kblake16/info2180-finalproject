<?php

require_once 'conn.php';

try{
    $fName = "user";
    $lName = "admin";
    $email = "admin@project2.com";
    $password = "password123";
    $password_h = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO UserTable(firstname, lastname, user_password, email,date_joined) 
    VALUES ('$fName','$lName', '$password_h','$email',NOW())";
    $conn->query($sql);
    echo "Admin has been added to DataBase";
    $conn = null;
}
catch(PDOException $e) 
{
    echo $sql . "<br>" . $e->getMessage();
}