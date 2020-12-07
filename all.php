<?php

require_once 'conn.php';

$checkIssue = "SELECT * FROM IssuesTable";
$checkUser = "SELECT * FROM UserTable";
$stmtIssue = $conn -> query($checkIssue);
$stmtUser = $conn -> query($checkUser);
$resultIssue = $stmtIssue ->fetchALL(PDO::FETCH_ASSOC);
$resultUser = $stmtUser ->fetchALL(PDO::FETCH_ASSOC);

if($resultIssue===[] || $resultUser===[])
{
    return false;
    $conn = null;
}
else
{
    foreach($resultIssue as $rowIssue)
    {
        echo "<tr>";
        $title = str_replace(' ', '',$rowIssue["title"]);
        $display1 = "display(event,'";
        $display2 = "".$title."')";
        $final = "".$display1."".$display2."";

        echo "<td> #".$rowIssue["id"]."<a href='' onclick=".$final."";
        echo ">".$rowIssue["title"]."</a></td>";
        echo "<td>".$rowIssue["issue_type"]."</td>";
        if($rowIssue["issue_status"] == "open")
        {
            echo "<td><button class='open'>". $rowIssue["issue_status"]. "</button></td>";
        }
        if($rowIssue["issue_status"] == "closed")
        {
            echo "<td><button class='closed'>". $rowIssue["issue_status"]. "</button></td>";
        }
        if($rowIssue["issue_status"] == "in progress")
        {
            echo "<td><button class='progress'>". $rowIssue["issue_status"]. "</button></td>";
        }
        foreach($resultUser as $rowUser)
        {
            if ($rowIssue["assigned_to"] == $rowUser["id"])
            {
                echo "<td>".$rowUser["firstname"]." ".$rowUser["lastname"]."</td>";
            }

        }
        echo "<td>". $rowIssue["created"]."</td>";
        echo "</tr>";
    }
    $conn = null;
}
