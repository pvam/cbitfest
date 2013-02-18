
var id = getCookie("username");//handle
	
//to get the cookie value(username)	in this page
function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}



if(id!=null||id!="") //checking if hes logged in or not
{
var xhr = new XMLHttpRequest();
        xhr.open('GET', 'js/display.php?id='+id,false);
        xhr.send(null);
    var encoded = xhr.responseText;
console.log(encoded);
decoded = JSON.parse(encoded);

//document.getElementById("fname").innerHTML = decoded.firstname;
document.getElementById("gender").innerHTML = decoded.gender;
document.getElementById("email").innerHTML = decoded.email;
document.getElementById("dob").innerHTML = decoded.dob;
}