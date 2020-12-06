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
            if ($row["title"] == "open")
            {
                echo "<h1>".$row["title"]."</h1>";
                echo "<p>".$row["id"]."</h1>";
                echo "<div class='displayArea'>";
                echo "<div class='textArea'>";
                echo "<p>".$row["issue_description"]."</p><br>";
                echo "<ul>";
                echo "<li>Issue created on ".$row[""]."at".$row[""]."by".$row[""]."</li>";
                echo "<li>Last updated on ".$row[""]."at".$row[""]."</li>";
                echo "</ul>";
                echo "</div>";
                echo "<div class='side'>";
                echo "<div class='box'>";
                echo "<lable>Assigned To:</label><p>".$row[""]."</p><br>";
                echo "<lable>Type:</label><p>".$row["issue_type"]."</p><br>";
                echo "<lable>Priority:</label><p>".$row["issue_priority"]."</p><br>";
                echo "<lable>Status:</label><p>".$row["issue_status"]."</p><br>";
                echo "</div>";
                echo "<button>Mark as Closed</button>";
                echo "<button>Mark In Progress</button>";
                echo "</div>";
                echo "</div>";
            }
        }
        $conn = null;
    }
