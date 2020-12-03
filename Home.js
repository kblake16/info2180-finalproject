/*window.onload = function()
{
    var httpRequest = new XMLHttpRequest();
    var url = "http://localhost:8080/info2180-finalproject/Home.php/";
    let table = document.getElementById("display");

    httpRequest.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    }

    httpRequest.open('GET', url,true);
    httpRequest.send();


    return false;

}*/