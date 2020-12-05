<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
		<title>BugMe Issue Tracker</title>

		<!-- link for css file -->
        <link href="Home.css" type="text/css" rel="stylesheet" />
        <link href="NewIssue.css" type="text/css" rel="stylesheet" />

		<!-- link for js file -->
		<script src="NewIssue.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
            <!--get icon-->
			<h1>BugMe Issue Tracker</h1>
        </header>
        
        <?php
        echo "NEW ISSUE"
        ?>

		<main class ="container">
			<div class="aside" id="aside">
                <a href="Home.html">Home</a>
                <a href="AddUser.html">Add User</a>
                <a href="NewIssue.html">New Issue</a>
                <a href="LogIn.html">Logout</a>
            </div>
			
			<div class="page" id="page">
                <!--input fields for users-->
                <h1>Create Issues</h1>

                <form id="createIssue" action="" onsubmit="">
                    <label for="title">Title</label>
                    <br>
					<input id="title" type="text" name="title"/>
                    <br>
                    <label for="description">Description</label>
                    <br>
					<input id="description" type="text" name="description" />
                    <br>
                    <label for="assignedTo">Assigned To</label>
					<select id ="assignedTo" name="assignedTo">
                    </select>
                    <br>
                    <label for="type">Type</label>
                    <br>
					<select id ="type" name="type">
                        <option value ="bug">Bug</option>
                        <option value ="proposal">Proposal</option>
                        <option value ="task">Task</option>
                    </select>
                    <br>
                    <label for="priority">Priority</label>
                    <br>
                    <select id ="priority" name="priority">
                        <option value ="major">Major</option>
                        <option value ="minor">Minor</option>
                        <option value ="critical">Critical</option>
                    </select>
					<br>
					<input type="submit" name ="submitForm" value="Submit" id="submit"/>
                </form>

			    
                
			</div>
		</main>

	</body>
</html>