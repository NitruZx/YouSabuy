<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<div id = "frm">  
        <h1>Reserve Room</h1>  
        <form name="f1" action = "Reserve.php" onsubmit = "return validation()" method = "POST">  
            <p>   
                <lable>
                   Name: </label>  
                <input type = "text" id ="firstname" name  = "firstname"  placeholder="firstname" required/>
                <input type = "text" id ="lastname" name  = "lastname"  placeholder="lastname" required/> 
            </p>  
            <p>
                <label> Phone : </label>
                <input type = "text" id ="phone" name = "phone" placeholder="phone" pattern="[0][0-9]{9}" required />
            </p>
            <p>
                <lable> Email : </lable>
                <input type="email" id ="email" name="email" placeholder="email" required>
            </p>
            <p>
                <lable> checkin date <label>
                <input type="date" id = "daycheckin" name="daycheckin" required/>
        </p>

        </p>
            <p>     
                <input type =  "submit" id = "btn" name="reserve" value = "Reserve-Room" />  
            </p>  
        </form>  
    </div>  
</body>


<?php
    $f_name = $_POST['firstname'];
    $L_name = $_POST['lastname'];
    $Tel_number = $_POST['phone'];
    $Email = $_POST['email'];
    $Reserve = $_POST['reserve'];
    if(isset($_POST['reserve'])){
        if(isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['phone'])){
            echo $f_name;
        }
    }
    
?>