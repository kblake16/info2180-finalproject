<?php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $title = $_POST['title'];
    $checkIssue = "SELECT * FROM IssuesTable";
    $checkUser = "SELECT * FROM UserTable";
    $stmtIssue = $conn -> query($checkIssue);
    $stmtUser = $conn -> query($checkUser);
    $resultIssue = $stmtIssue ->fetchALL(PDO::FETCH_ASSOC);
    $resultUser = $stmtUser ->fetchALL(PDO::FETCH_ASSOC);

    if($resultIssue===[] || $resultUser===[])
    {
        echo "Login Failed. Please ensure your email and password are correct";
        return false;
        $conn = null;
    }
    else
    {
        foreach($resultIssue as $rowIssue)
        {
            if (str_replace(' ', '',$rowIssue["title"]) == str_replace(' ', '',$title))
            {
                echo "<h1>".$rowIssue["title"]."</h1>";
                echo "<p class = 'issueid'> Issue #".$rowIssue["id"]."</h1>";
                echo "<div class='displayArea'>";
                echo "<div class='textArea'>";
                echo "<p>".$rowIssue["issue_description"]."</p><br>";
                echo "<ul>";
                foreach($resultUser as $rowUser)
                {
                    if ($rowIssue["created_by"] == $rowUser["id"])
                    {
                        $date = explode(" ",$rowIssue["created"]);
                        echo "<li class = 'updates'>Issue created on".$date[0]."at".$date[1]."by".$rowUser["firstname"]." ".$rowUser["lastname"]."</li>";
                    }

                }
                $date = explode(" ",$rowIssue["updated"]);
                echo "<li class = 'updates'>Last updated on ".$date[0]."at".$date[1]."</li>";
                echo "</ul>";
                echo "</div>";
                echo "<div class='side'>";
                echo "<div class='box'>";
                foreach($resultUser as $rowUser)
                {
                    if ($rowIssue["assigned_to"] == $rowUser["id"])
                    {
                        echo "<lable>Assigned To:</label><p>".$rowUser["firstname"]." ".$rowUser["lastname"]."</p><br>";
                    }

                }
                echo "<lable>Type:</label><p>".$rowIssue["issue_type"]."</p><br>";
                echo "<lable>Priority:</label><p>".$rowIssue["issue_priority"]."</p><br>";
                echo "<lable>Status:</label><p>".$rowIssue["issue_status"]."</p><br>";
                echo "</div>";
                echo "<button id='rb'>Mark as Closed</button>";
                echo "<button id='rb2'>Mark In Progress</button>";
                echo "</div>";
                echo "</div>";
            }
        }
        $conn = null;
    }
}
