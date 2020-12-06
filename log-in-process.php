<?php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    userLogin($email,$password,$conn);

    $conn = null;
}

function userLogin($e,$p,$conn)
{
    if(!(checkLogin($e,$p,$conn)))
    {
        return false;
    }
    else
    {
        getFile();
    }

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
        return false;
    }
    else
    {
        foreach($result as $row)
        {
            if($row['email'] == $e && $row['user_password'] == $p)
            {
                return true;
            }
            else{
                include "log-in.php";
                return false;
            }
        }
    }
}

