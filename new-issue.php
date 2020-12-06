<link href="new-issue.css" type="text/css" rel="stylesheet" />

<h1>Create Issue</h1>
<form id="createIssue" method="post" onsubmit="validateIssue(event)">
    <label for="title">Title</label>
    <br>
    <input id="title" type="text" name="title"/>
    <br>
    <label for="description">Description</label>
    <br>
    <input id="description" type="text" name="description" />
    <br>
    <label for="assignedTo">Assigned To</label>
    <br>
    <select id ="assignedTo" name="assignedTo">
    <?php 
    $checkUser = "SELECT * FROM UserTable";
    $stmtUser = $conn -> query($checkUser);
    $resultUser = $stmtUser ->fetchALL(PDO::FETCH_ASSOC);

    if($resultUser===[])
    {
        echo "Login Failed. Please ensure your email and password are correct";
        return false;
        $conn = null;
    }
    else
    {
    foreach($resultIssue as $rowIssue)
    {
    ?>
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
    <input type="submit" name ="submit" value="submit" id="submit"/>
</form>
