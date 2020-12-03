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
