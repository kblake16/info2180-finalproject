<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
		<title>BugMe Issue Tracker</title>

		<!-- link for css file -->
		<link href="Home.css" type="text/css" rel="stylesheet" />

		<!-- link for js file -->
		<script src="Home.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
            <!--get icon-->
			<h1>BugMe Issue Tracker</h1>
        </header>
        
        <?php

        require_once 'conn.php';

        $check = "SELECT * FROM IssuesTable";
        $stmt = $conn -> query($check);
        $result = $stmt ->fetchALL(PDO::FETCH_ASSOC);

        if($result===[])
        {
            echo "Login Failed. Please ensure your email and password are correct";
            return false;
            $conn = null;
        }
        else
        {
            foreach($result as $row)
            {
                echo "<tr>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["issue_description"]."</td>"  ;
                echo "<td>".$row["issue_type"]."</td>";
                echo "<td>". $row["issue_priority"]."</td>";
                echo "<td>". $row["issue_status"]. "</td>";
                echo "<td>". $row["assigned_to"]."</td>"; 
                echo "<td>". $row["created_by"]."</td>";
                echo "<td>". $row["created"]."</td>";
                echo "<td>". $row["updated"]."</td>";
                echo "</tr>";
            }
            $conn = null;
        }
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
                <div id="top">
                    <h1>Issues</h1>
                    <button id="IssueBtn" ><a href="NewIssue.html">Create New Issue</a></button>
                </div>

			    <div id="filter">
                    <p>Filter by:</p>
                    <button>ALL</button>
                    <button>OPEN</button>
                    <button>MY TICKETS</button>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Assigned To</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody id = "display">
                        </tbody>
                </div>
                
			</div>
		</main>

	</body>
</html>

