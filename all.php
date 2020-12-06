
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
    foreach($result as $rowIssue)
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
        echo "<td>". $rowIssue["assigned_to"]."</td>"; 
        echo "<td>". $rowIssue["created"]."</td>";
        echo "</tr>";
    }
    $conn = null;
}
