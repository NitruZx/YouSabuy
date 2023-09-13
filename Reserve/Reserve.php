<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<div id = "frm">  
        <h1>Reserve Room</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>   
                <lable>
                   Name: </label>  
                <input type = "text" id ="firstname" name  = "firstname"  placeholder="firstname"/>
                <input type = "text" id ="lastname" name  = "lastname"  placeholder="lastname"/> 
            </p>  
            <p>
                <label> Phone : </label>
                <input type = "text" id ="phone" name = "phone" placeholder="phone"/>
            </p>
            <p>
                <lable> Email : </lable>
                <input type="text" id ="email" name="email" placeholder="email">
            </p>
            <p>     
                <input type =  "submit" id = "btn" value = "Reserve-Room" />  
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