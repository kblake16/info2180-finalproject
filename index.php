<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
        <title>BugMe Issue Tracker</title>
        
        <link rel="icon" href="IMG/bug.svg" type="image/icon type">
		<!-- link for css file -->
		<link href="styles.css" type="text/css" rel="stylesheet" />

        <!-- link for js file -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="index.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
            <!--get icon-->
            <img src= "IMG/bug.svg" class="bug"> 
			<h1>BugMe Issue Tracker</h1>
		</header>

		<main class ="container">
			<div class="aside" id="aside">
                <a id = "nav-home" href="#" onclick="home(event)"><img src= "IMG/home.svg" class="icon"> Home</a>
                <div id="admin">
                    <a id = 'nav-user' href='#' onclick='user(event)'><img src= 'IMG/user.svg' class='icon'> Add User</a>
                </div>
                <a id = "nav-issue" href="#" onclick="issue(event)"><img src= "IMG/issue.svg" class="icon"> New Issue</a>
                <a id = "nav-out" href="#" onclick="out(event)"><img src= "IMG/logout.svg" class="icon"> Logout</a>
            </div>
			
			<div class="page" id="page">
                <!--load pages-->
                    <?php include "log-in.php";?>
                
			</div>
		</main>

	</body>
</html>