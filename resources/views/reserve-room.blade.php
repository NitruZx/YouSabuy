<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link  rel="stylesheet" href="{{url('build/assets/reserve.css')}}">
  <title>Reserve-Room</title>
  
</head>
<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
  <h1>Reservation</h1>

  <form action="/">  
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="name" id="name" placeholder="FirstName" required/>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="name" id="name" placeholder="Last Name" required/>
  
  <div>
    <label id="icon" for="name"><i class="icon-phone "></i></label>
    <input type="text" name="name" id="name" placeholder="Tel." required>
    <label id="icon" for="name"><i class="icon-envelope "></i></label>
    <input type="text" name="name" id="name" placeholder="Email" required>
  </div>
  <div class="datetime">
    <label for="datetime">Choose Date(in):</label>
    <input class="form-control calendar" type="date">
  </div>
  <div class="datetime">
    <label for="datetime">Choose Date(out):</label>
    <input class="form-control calendar" type="date">
  </div>
  <input type="text" name="name" id="name" placeholder="Bank Account" required/>
  <input type="text" name="name" id="name" placeholder="Room(Building/No.)" required/>
  <div class="avatar"><label>Select file: </label><input type="file" name="Upload_img" accept="pdf/*" required /></div>
   <a href="/" class="button">Reserved</a> 
  </form>
</div>
</body>
</html>