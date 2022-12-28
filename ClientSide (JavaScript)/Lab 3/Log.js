
function Log () {

var   Pass=  document.getElementById('pass').value ,
    User=  document.getElementById('user').value ;
   


     
        if (Pass == "000" && User == "aaa") {
                alert("Welcome Login Success") ;
        }
        else if (Pass != "000" && User == "aaa") {
            alert("Wrong Password")
        }
        else if (Pass === "000" && User != "aaa") {
            alert("Wrong Username")
        }
        else {
            alert("Try Again") 
        }
        
    }
