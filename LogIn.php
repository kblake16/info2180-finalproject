<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
		<title>BugMe Issue Tracker</title>

		<!-- link for css file -->
		<link href="Home.css" type="text/css" rel="stylesheet" />
		<link href="LogIn.css" type="text/css" rel="stylesheet" />
		<!-- link for js file -->
		<script scr="LogIn.js"> </script>
	</head>

	<body>
		<header>
			<h1>Bug Me Issue Tracker</h1>
        </header>
        
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
        ?>

		<main class ="container">
			<div class="aside" id="aside">
                <a href="Home.html" onclick="return false;">Home</a>
                <a href="AddUser.html" onclick="return false;">Add User</a>
                <a href="NewIssue.html" onclick="return false;">New Issue</a>
                <a href="LogIn.html" onclick="return false;">Logout</a>
			</div>
			
			<div class="page" id="page">
				<form class="login" id="login" action= "LogIn.php" onsubmit = "validate();" method="POST">
					<h1> login</h1>
					<!--input fields for users-->
					<label for="email">Email</label>
					<br>
					<input id="email" type="email" name="email"/>
					<br>
					<label for="password">Password</label>
					<br>
					<input id="password" type="password" name="password"/>
					
					<!--<input type="hidden" name="hidden" value= "6eb6ac241942dc7226aeb"/>-->
					<br>
					<input type="submit" name ="submitForm" value="Submit" id="submit"/>
				</form>
			</div>
		</main>

	</body>
</html>



