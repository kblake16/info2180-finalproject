<!-- link for css file -->
<link href="home.css" type="text/css" rel="stylesheet"/>

<div id="top">
    <h1 class="topRow">Issues</h1>
    <button id="IssueBtn" onclick="issue(event)" class="topRow">Create New Issue</button>
</div>

<div id="filter">
    <p>Filter by:</p>
    <button id="all" name="all" value="all" onclick="viewAll(event)" class="bfilter">ALL</button>
    <button id="open" name="open" value="open" onclick="viewOpen(event)" class="bfilter">OPEN</button>
    <button id="tickets" name="tickets" value="tickets" class="bfilter" onclick="viewMine(event)" >MY TICKETS</button>
</div>

<div id ="table">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th >Type</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody id = "display">
                <?php  include "all.php";?>
        </tbody>
    </table>
</div>