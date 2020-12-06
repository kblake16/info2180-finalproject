<?php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $sql = "INSERT INTO UserTable(firstname, lastname, user_password, email,date_joined) 
        VALUES ('$fName','$lName', '$password','$email',NOW())";
        $conn->exec($sql);
    }
    catch(PDOException $e) 
      {
      echo $sql . "<br>" . $e->getMessage();
      }

    $conn = null;
}