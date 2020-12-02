function validate()
{
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+ )*$/;

    /*if ( pasword.value == "" || password.value.length >= 8 && password.value.match(upperCaseLetters))
    {

    }*/

    if (email.value == " " || email.value.match(check))
    {
        alert("yes");
    }
    else
    {
        alert("no");
    }

}