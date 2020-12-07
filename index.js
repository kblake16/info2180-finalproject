var httpRequest = new XMLHttpRequest();

function home(event){
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            page.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', 'home.php',true);
    httpRequest.send();
    event.preventDefault();
}

function user(event){
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            page.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', 'add-user.php',true);
    httpRequest.send();
    event.preventDefault();
}

function issue(event){
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            page.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', 'new-issue.php',true);
    httpRequest.send();
    event.preventDefault();
}

function out(event){
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            page.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', 'log-in.php',true);
    httpRequest.send();
    event.preventDefault();
}

function viewAll(event){
    let table = document.getElementById("display");
    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', 'all.php',true);
    httpRequest.send();

    event.preventDefault();
}

function viewOpen(event){
    let table = document.getElementById("display");
    httpRequest.onreadystatechange = function()
    {

        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET','open.php',true);
    httpRequest.send();

    event.preventDefault();
}

function viewMine(event){
    let table = document.getElementById("display");
    httpRequest.onreadystatechange = function()
    {

        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET','myTicket.php',true);
    httpRequest.send();

    event.preventDefault();
}

function closed(event,id){

    var loginString = "";
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = processName;
    httpRequest.open('POST', 'process-status.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    loginString += "id=" + encodeURIComponent(id);
    loginString += "&status=" + encodeURIComponent("closed");
    httpRequest.send(loginString);
    console.log(loginString);
    event.preventDefault();

    function processName() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                page.innerHTML = this.responseText;
            } else {
            alert('There was a problem with the request.');
            }
        }
    }
}

function inProgress(event,id){

    var loginString = "";
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = processName;
    httpRequest.open('POST', 'process-status.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    loginString += "id=" + encodeURIComponent(id);
    loginString += "&status=" + encodeURIComponent("in progress");
    httpRequest.send(loginString);
    console.log(loginString);
    event.preventDefault();

    function processName() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                page.innerHTML = this.responseText;
            } else {
            alert('There was a problem with the request.');
            }
        }
    }
}

function display(event,title)
{
    var loginString = "";
    var page = document.getElementById("page");
    httpRequest.onreadystatechange = processName;
    httpRequest.open('POST', 'display-issue.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    loginString += "title=" + encodeURIComponent(title);
    httpRequest.send(loginString);
    event.preventDefault();

    function processName() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                page.innerHTML = this.responseText;
            } else {
            alert('There was a problem with the request.');
            }
        }
    }
    
}


function validateUser(event)
{
    var form = document.getElementById("newUser")
    var checkEmail = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
    var checkPassword = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var passRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");


    var validate = false;
    var msg = "";
    var loginString = "";
    console.log("new user submitted");

    var fname = document.getElementById("firstName");
    var lname = document.getElementById("lastName");
    var password = document.getElementById("password");
    var email = document.getElementById("email");

    if (isEmpty(fname.value.trim()))
    {
        validate= true;
        msg += "You must fill in your First Name\n";
        event.preventDefault();
    }

    if (isEmpty(lname.value.trim()))
    {
        validate = true;
        msg += "You must fill in your Last Name\n";
        event.preventDefault();
    }

    if (isEmpty(password.value.trim()) || password.value.length < 8 ) 
    {
        validate = true;
        msg += "Incorrect format for password\n";
        event.preventDefault();
    }

    if (isEmpty(email.value.trim()) )
    {
        validate = true;
        msg += "Incorrect format for email address.\n";
        event.preventDefault();
    }

    if (validate) {
        console.log('Please fix issues in Form submission and try again.');
        alert(msg);
        event.preventDefault();
    }
    else{
        httpRequest.onreadystatechange = processName;
        httpRequest.open('POST', 'add-user-process.php');
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        loginString += "firstName=" + encodeURIComponent(fname.value);
        loginString += "&lastName=" + encodeURIComponent(lname.value);
        loginString +="&password="+  encodeURIComponent(password.value);
        loginString += "&email=" + encodeURIComponent(email.value);
        httpRequest.send(loginString);
        event.preventDefault();
    }

    function processName() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var response = httpRequest.responseText;
            } else {
            alert('There was a problem with the request.');
            }
        }
    }

    function isEmpty(elementValue) {
        if (elementValue.length == 0) {
            // Or you could check if the value == ""
            console.log('field is empty');
            return true;
        }
        return false;
    }

    form.reset();
    event.preventDefault();
}

function validateIssue(event)
{
    var form = document.getElementById("createIssue");
    var httpRequest = new XMLHttpRequest();
    var loginString = "";
    var msg = "";
    var validate = false;
    
    var title = document.getElementById("title");
    var description = document.getElementById("description");
    var assignedTo = document.getElementById("assignedTo");
    var type = document.getElementById("type");
    var priority = document.getElementById("priority");

        if (isEmpty(title.value.trim())) // check for capital letter , common letter, number
        {
            validate = true;
            msg += "Enter a Title\n";
            event.preventDefault();
        }

        if (isEmpty(description.value.trim()) )
        {
            validate = true;
            msg += "Enter a Description\n";
            event.preventDefault();
        }
        if (isEmpty(assignedTo.value.trim()) )
        {
            validate = true;
            msg += "Select a Person Assigned to\n";
            event.preventDefault();
        }
        if (isEmpty(type.value.trim()) )
        {
            validate = true;
            msg += "Select a Type\n";
            event.preventDefault();
        }
        if (isEmpty(priority.value.trim()) )
        {
            validate = true;
            msg += "Select a Priority\n";
            event.preventDefault();
        }

        if (validate) {
            console.log('Please fix issues in Form submission and try again.');
            alert(msg);
            event.preventDefault();
        }
        else{

            httpRequest.onreadystatechange = processName;
            httpRequest.open('POST', 'new-issue-process.php');
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            loginString += "title=" + encodeURIComponent(title.value);
            loginString += "&description=" + encodeURIComponent(description.innerHTML);
            loginString +="&assignedTo="+  encodeURIComponent(assignedTo.value);
            loginString += "&type=" + encodeURIComponent(type.value);
            loginString += "&priority=" + encodeURIComponent(priority.value);
            httpRequest.send(loginString);
            event.preventDefault();
        }

    function processName() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
          if (httpRequest.status === 200) {
            var response = httpRequest.responseText;
          } else {
            alert('There was a problem with the request.');
          }
        }
    }

    function isEmpty(elementValue) {
        if (elementValue.length == 0) {
            // Or you could check if the value == ""
            console.log('field is empty');
            return true;
        }
        return false;
    }

    form.reset();
    event.preventDefault();
}

window.onload =  function()
{ var form = document.getElementById("login");
    form.onsubmit = function(event)
    {
        var page = document.getElementById("page");
        var addUser = document.getElementById("admin");
        var email = document.getElementById("loginEmail");
        var password = document.getElementById("loginPassword");

        var loginString = "";
        var msg = "";
        var validate = false;

        var check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+ )*$/;

        console.log("here");

        if (isEmpty(password.value.trim()) || password.value.length < 8 ) // check for capital letter , common letter, number
        {
            validate = true;
            msg += "Incorrect format for password\n";
            event.preventDefault();
        }

        if (isEmpty(email.value.trim()) )
        {
            validate = true;
            msg += "Incorrect format for email address.\n";
            event.preventDefault();
        }

        if (validate) {
            console.log('Please fix issues in Form submission and try again.');
            alert(msg);
            event.preventDefault();
        }
        else{
            httpRequest.onreadystatechange = processName;
            httpRequest.open('POST', 'log-in-process.php');
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            loginString += "loginPassword=" + encodeURIComponent(password.value);
            loginString += "&loginEmail=" + encodeURIComponent(email.value);
            if (email.value !== 'admin@project2.com')
            {
                addUser.style.display ="none";
            }
            httpRequest.send(loginString);
            event.preventDefault();
        }

        function processName() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    console.log(httpRequest.responseText);
                    page.innerHTML = httpRequest.responseText;
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }

        function isEmpty(elementValue) {
            if (elementValue.length == 0) {
                // Or you could check if the value == ""
                console.log('field is empty');
                return true;
            }
            return false;
        }

        event.preventDefault();
    }
}