
function Log()
                    {    
                        var usernameInput  = document.getElementById("userName");
                        var passwordInput  = document.getElementById("passwd");
                        var out            = document.getElementById("output");

            var username= usernameInput.value ;
            var pass    =passwordInput.value
            
                        if((username == "ahmed") && (pass == "123")){
                            //alert("Welcome login success");
                            out.style.backgroundColor = "Green";
                            out.innerHTML = "Welcome login success";
                            usernameInput.style.border ="green 5px solid"
                            passwordInput.style.border ="green 5px solid"
                        }
                        else if((username != "ahmed") && (pass == "123")){
                            //alert("Error || Incorrect Username");
                            out.style.backgroundColor = "red";
                            out.innerHTML = "Error || Incorrect Username";
                            usernameInput.style.border ="red 5px dashed"
                            passwordInput.style.border ="green 5px solid"
                        }
                        else if((username == "ahmed") && (pass != "123")){
                            //alert("Error || Incorrect Password");
                            out.style.backgroundColor = "red";
                            out.innerHTML = "Error || Incorrect Password";
                            passwordInput.style.border ="red 5px dashed" ;
                            usernameInput.style.border ="green 5px solid"
                        }
                        else{
                            //alert("Error || Incorrect Username and Password");
                            out.style.backgroundColor = "red";
                            out.innerHTML = "Error || Incorrect Username and Password";
                            usernameInput.style.border ="red 5px dashed"
                            passwordInput.style.border ="red 5px dashed"
                        }
                    }