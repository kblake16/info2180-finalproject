<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<img src="/IMG/iconfinder_ic_bug_report_48px_352251.svg" alt="">
		<title>BugMe Issue Tracker</title>

		<!-- link for css file -->
		<link href="Home.css" type="text/css" rel="stylesheet" />
		<link href="AddUser.css" type="text/css" rel="stylesheet" />

		<!-- link for js file -->
		<script src="AddUser.js"></script>
	</head>

	<body>
		<header>
			<h1>Bug Me Issue Tracker</h1>
		</header>

		<?php 
        $password = $_POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        /**var_dump($hashed_password);*/

		?>

		<main class ="container">
			<div class="aside" id="aside">
                <img src="/IMG/iconfinder_ic_home_48px_3669170.svg" alt="Home"> <a href="Home.html">Home</a>
                <img src="/IMG/iconfinder_person_add_4964052.svg" alt="Add User"> <a href="AddUser.html">Add User</a>
                <img src="/IMG/iconfinder_ic_add_circle_48px_3669476.svg" alt="New Issue"> <a href="NewIssue.html">New Issue</a>
                <img src="/IMG/iconfinder_power-button_353434.svg" alt="Logout"> <a href="LogIn.html">Logout</a>
			</div>
			
			<div class="page" id="page">
				<h1>New User</h1>
				<!--input fields for users-->
				<form id= "newUser" action="AddUser.php" onsubmit="validate();" method="post">
					<label for="firstName">Firstname</label>
					<br>
					<input id="firstName" type="text" name="firstName" />
					<br>
					<label for="LastName">Lastname</label>
					<br>
					<input id="LastName" type="text" name="LastName"/>
					<br>
					<label for="password">Password</label>
					<br>
					<input id="password" type="password" name="password" />
					<br>
					<label for="email">Email</label>
					<br>
					<input id="email" type="email" name="email"/>
					<br>
					<input id="submit" type="submit" value="Submit">
				</form>
			</div>
		</main>

	</body>
</html>
