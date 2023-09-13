<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8">

</head>
<body>
<div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> lastname: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
        </form>  
    </div>  
</body>


<?php
    $f_name;
    $L_name;
    $Tel_number;
    $Email;
    $Person_Num;
    

?>