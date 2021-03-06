<?php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $id= (int)$_POST['id'];
    $status = $_POST['status'];

    try
    {
        $sql = "UPDATE IssuesTable SET issue_status = '$status' WHERE id = $id";
        $next = "UPDATE IssuesTable SET updated = NOW() WHERE id = $id";
        $conn->exec($sql);
        $conn->exec($next);

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
                if ($rowIssue["id"] == $id)
                {
                    echo "<h1>".$rowIssue["title"]."</h1>";
                    echo "<p> Issue #".$rowIssue["id"]."</h1>";
                    echo "<div class='displayArea'>";
                    echo "<div class='textArea'>";
                    echo "<p>".$rowIssue["issue_description"]."</p><br>";
                    echo "<ul>";
                    foreach($resultUser as $rowUser)
                    {
                        if ($rowIssue["created_by"] == $rowUser["id"])
                        {
                            $date = explode(" ",$rowIssue["created"]);
                            echo "<li>Issue created on ".$date[0]." at ".$date[1]." by ".$rowUser["firstname"]." ".$rowUser["lastname"]."</li>";
                        }

                    }
                    $date = explode(" ",$rowIssue["updated"]);
                    echo "<li>Last updated on ".$date[0]." at ".$date[1]."</li>";
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

                    echo "<tr>";
                    $id = $rowIssue["id"];
                    $display = "inProgress(event,";
                    $display1 = "closed(event,";
                    $display2 = "".$id.")";
                    $final = "".$display1."".$display2."";
                    $finalP = "".$display."".$display2."";

                    echo "<button id='rb' onclick=".$final.">Mark as Closed</button>";
                    echo "<button id='rb2' onclick=".$finalP.">Mark In Progress</button>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        $conn = null;
    }
    catch(PDOException $e) 
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}