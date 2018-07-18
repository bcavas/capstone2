// navbar

$( "li" ).hover(
  function() {
      $(this).find("span").stop().animate({
      width:"100%",
      opacity:"1",
    }, 400, function () {
    })
  }, function() {
      $(this).find("span").stop().animate({
      width:"0%",
      opacity:"0",
    }, 400, function () {
    })
  }
);

//endNavbar

//registration password check
function pwCheck(){
  var pw1 = document.getElementById("password").value;
  var pw2 = document.getElementById("password2").value;
  if(pw2 != pw1){
    document.getElementById("pwMatch").innerHTML = "Mismatched passwords";
    document.getElementById("submit").disabled = true;
  }else{
    document.getElementById("pwMatch").innerHTML = "Passwords match";
    document.getElementById("submit").disabled = false;
  }
}




//AJAX live search
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}