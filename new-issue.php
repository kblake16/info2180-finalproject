<link href="new-issue.css" type="text/css" rel="stylesheet" />

<h1>Create Issue</h1>
<form id="createIssue" method="post" onsubmit="validateIssue(event)">
    <label for="title">Title</label>
    <br>
    <input id="title" type="text" name="title"/>
    <br>
    <label for="description">Description</label>
    <br>
    <textarea id="description" type="text" name="description"></textarea>
    <br>
    <label for="assignedTo">Assigned To</label>
    <br>
    <select id ="assignedTo" name="assignedTo">
    <?php 
        require_once 'conn.php';
        try
        {
            $check = "SELECT * FROM UserTable";
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
                    echo "<option value = '".$row["id"]."'>".$row["firstname"]." ".$row["lastname"]."</option>";
                }
            }
        }
        catch(PDOException $e) 
        {
            echo $check . "<br>" . $e->getMessage();
        }
    ?>
    </select>
    <br>
    <label for="type">Type</label>
    <br>
    <select id ="type" name="type">
        <option value ="Bug">Bug</option>
        <option value ="Proposal">Proposal</option>
        <option value ="Task">Task</option>
    </select>
    <br>
    <label for="priority">Priority</label>
    <br>
    <select id ="priority" name="priority">
        <option value ="Major">Major</option>
        <option value ="Minor">Minor</option>
        <option value ="Critical">Critical</option>
    </select>
    <br>
    <input type="submit" name ="submit" value="submit" id="submit"/>
</form>
