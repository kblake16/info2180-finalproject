<?php

require_once 'dbconfig.php';

try
{
    $conn = new PDO("mysql: host=$host; dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully. <br>";

    function userLogin($e,$p)
    {
        if(!(checkLogin($e,$p)))
        {
            return false
        }
        else
        {
            echo "Login Successful";
        }

    }

    function checkLogin($e,$p)
    {
        $check = "SELECT email,password FROM UserTable WHERE email = $email"
    }


    if (isset($_POST['submitForm']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        userLogin($email,$password);
    }

}
catch(PDOException $pe)
{
    die("Could not connect to the database $dbname:" . $pe->getMessage());
}