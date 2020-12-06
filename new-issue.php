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
    <input id ="assignedTo" type="text" name="assignedTo" value="Kayla"/>
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
