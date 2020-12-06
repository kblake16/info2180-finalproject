<!-- link for css file -->
<link href="add-user.css" type="text/css" rel="stylesheet" />

<h1>New User</h1>
<!--input fields for users-->
<form id= "newUser" onsubmit="validateUser(event)" method="post"> <!--action="AddUser.php" method="POST"-->
    <label for="firstName">Firstname</label>
    <br>
    <input id="firstName" type="text" name="firstName" value=""/>
    <br>
    <label for="LastName">Lastname</label>
    <br>
    <input id="lastName" type="text" name="lastName" value=""/>
    <br>
    <label for="password">Password</label>
    <br>
    <input id="password" type="password" name="password" value=""/>
    <br>
    <label for="email">Email</label>
    <br>
    <input id="email" type="email" name="email" value=""/>
    <br>
    <input id="submit" type="submit" name= "submit" value="submit">
</form>