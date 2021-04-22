function validation(e){
    
    var regEx=/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{7,})\S$/;
    var pass = document.getElementById("password").value;
    var cpass = document.getElementById("cpassword").value;
    var result = regEx.test(pass);
    if(!result){
        e.preventDefault();  
        document.getElementById("password-regex").innerHTML = "Password must contain a minimum of 8 characters, at least 1 uppercase letter, 1 lowercase letter, and 1 number with no spaces.";
        document.getElementById("password-regex").className = "msg error smaller";
    }else{
        document.getElementById("password-regex").innerHTML = "";
        document.getElementById("password-regex").className = "";
   
    }
    if(pass!=cpass){
        e.preventDefault(); 
        document.getElementById("password-notmatch").innerHTML = "Password confirmation does not match.";
        document.getElementById("password-notmatch").className = "msg error smaller";
    
    }
    
}