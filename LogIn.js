function validate()
{
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+ )*$/;

    /*if ( pasword.value == "" || password.value.length >= 8 && password.value.match(upperCaseLetters))
    {

    }*/
    console.log("java");
    
    if (email.value == "" || email.value.match(check))
    {
        console.log("check");
        alert("no");
        email.style.borderColor= "red";
        
        return false;
    }


}