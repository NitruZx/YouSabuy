<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link  rel="stylesheet" href="{{ asset('css/reserve.css')}}">
  <title>Reserve-Room</title>
  
</head>
<body>
  
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testbox">
  <h1>Reservation</h1>

  <form action="/addinfo" method="post">

    @csrf
  <hr>
  <label id="icon" for="fname"><i class="icon-user"></i></label>
  <input type="text" name="fname" id="fname" placeholder="FirstName"/>
  
  <label id="icon" for="lname"><i class="icon-user"></i></label>
  <input type="text" name="lname" id="lname" placeholder="Last Name"/>
  
  <div>
    <label id="icon" for="phone"><i class="icon-phone "></i></label>
    <input type="text" name="phone" id="phone" placeholder="Tel.">
    <label id="icon" for="email"><i class="icon-envelope "></i></label>
    <input type="text" name="email" id="email" placeholder="Email">
  </div>
  <div class="datetime">
    <label for="datetime">Choose Date(in):</label>
    <input class="form-control calendar" type="date" name="datecheckin">
    <label for="datetime">Choose Date(out):</label>
    <input class="form-control calendar" type="date" name="datecheckout">

  <input type="text" name="bankaccount" id="name" placeholder="Bank Account" />
  <input type="text" name="room" id="room" placeholder="Room(Building/No.)" />
  <div class="avatar"><label>เอกสารยืนยัน: </label><input type="file" name="avatar" accept="pdf/*"  /></div>
      <button type="submit" class="button">Reserve</button>
  </form>
</div>
</body>
</html>