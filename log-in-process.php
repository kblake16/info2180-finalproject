<?php

require_once 'conn.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    checkLogin($email,$password,$conn);
    $conn = null;
}

function getFile()
{
    if(file_exists("home.php"))
    {
       include "home.php";
    }
    else{
        include "log-in.php";
    }
}

function checkLogin($e,$p,$conn)
{
    $check = "SELECT * FROM UserTable";
    $stmt = $conn->query($check);
    $result = $stmt ->fetchALL(PDO::FETCH_ASSOC);

    if($result===[])
    {
        include "log-in.php";
    }
    else
    {
        foreach($result as $row)
        {
            if($row['email'] == $e && password_verify($p,$row['user_password']))
            {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                getFile();
                break;
            }
        }
        include "log-in.php";
    }

}

