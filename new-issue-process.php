<?php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $assignedTo = $_POST['assignedTo'];
    $type = $_POST['type'];
    $prioroty= $_POST['priority'];
    $o = "open";

    try{
        $sql = "INSERT INTO IssuesTable(title, issue_description, issue_type, issue_priority,issue_status,assigned_to,created_by,created,updated) 
        VALUES ('$title','$description', '$type','$prioroty','$o','$assignedTo','$o',NOW(),NOW())";
        $conn->exec($sql);
    }
    catch(PDOException $e) 
      {
      echo $sql . "<br>" . $e->getMessage();
      }

    $conn = null;
}