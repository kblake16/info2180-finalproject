function validate(){
    var fname = document.getElementById("firstName");
    var lname = document.getElementById("lastName");
    var password = document.getElementById("password");
    var email = document.getElementById("email");

    if (fname.value == " ")
    {
        alert("no");
    }

    if (lname.value == " ")
    {
        alert("no");
    }

    if (password.value == " " || password.value.length < 8 ) // check for capital letter , common letter, number
    {
        alert("no");
    }

    if (email.value == " ")
    {
        alert("no");
    }
}