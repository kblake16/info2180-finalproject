<?php

require_once 'conn.php';

if (isset($_POST['submitForm']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

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
    if(file_exists("../Home.html"))
    {
        include "../Home.html";
    }
    else{
        echo "Opps! File not found. Please check the path again";
    }
}

function checkLogin($e,$p,$conn)
{
    $check = "SELECT * FROM UserTable";
    $stmt = $conn -> query($check);
    $result = $stmt ->fetchALL(PDO::FETCH_ASSOC);

    if($result===[])
    {
        echo "Login Failed. Please ensure your email and password are correct";
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
                echo "Login Failed. Please ensure your email and password are correct";
                return false;
            }
        }
    }
}

