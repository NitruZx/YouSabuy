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
  <input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}" placeholder="FirstName"/>
  
  <label id="icon" for="lname"><i class="icon-user"></i></label>
  <input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}" placeholder="Last Name"/>
  
  <div>
    <label id="icon" for="phone"><i class="icon-phone "></i></label>
    <input type="text" name="phone" id="phone" value="{{Auth::user()->tel}}" placeholder="Tel.">
    <label id="icon" for="email"><i class="icon-envelope "></i></label>
    <input type="text" name="email" id="email" value="{{Auth::user()->email}}" placeholder="Email">
  </div>
  <div class="datetime">
    <label for="datetime">Choose Date(in):</label>
    <input class="form-control calendar" type="date" name="datecheckin">
    <label for="datetime">Choose Date(out):</label>
    <input class="form-control calendar" type="date" name="datecheckout">

  <input type="text" name="bankaccount" id="name" placeholder="Bank Account" />
  <hr
  <label for="Room_id">Choose your room:</label>
  <select id="Room_id" name="room">
    <option value="A101">A101</option>
    <option value="A102">A102</option>
    <option value="A103">A103</option>
    <option value="A104">A104</option>
    <option value="A201">A201</option>
    <option value="A202">A202</option>
    <option value="A203">A203</option>
    <option value="A204">A204</option>
    <option value="B101">B101</option>
    <option value="B102">B102</option>
    <option value="B103">B103</option>
    <option value="B104">B104</option>
    <option value="B201">B201</option>
    <option value="B202">B202</option>
    <option value="B203">B203</option>
    <option value="B204">B204</option>
  </select>
      <button type="submit" class="button">Reserve</button>
  </form>
</div>
</body>
</html>