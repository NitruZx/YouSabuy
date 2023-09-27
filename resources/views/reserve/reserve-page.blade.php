<div class="testbox">
    <h1>Reservation</h1>
  
    <form action="{{route('reserve.addinfo')}}" method="post">
  
      @csrf
    <hr>
    <label id="icon" for="fname"><i class="icon-user"></i></label>
    <input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}" readonly placeholder="FirstName" />
    <br>
    <label id="icon" for="lname"><i class="icon-user"></i></label>
    <input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}" readonly placeholder="Last Name" />
    <br>
    <label id="icon" for="phone"><i class="icon-phone "></i></label>
    <input type="text" name="phone" id="phone" value="{{Auth::user()->tel}}" readonly placeholder="Tel." />
    <br>
    <label id="icon" for="email"><i class="icon-envelope "></i></label>
    <input type="text" name="email" id="email" value="{{Auth::user()->email}}" readonly placeholder="Email" />
    <br>
    <div class="datetime">
      <label for="datetime">Choose Date(in):</label>
      <input class="form-control calendar" type="date" name="datecheckin">
    </div>
    <input type="text" name="bankaccount" id="name" placeholder="Bank Account" />
    <br>
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
        <button class="button">Cancel</button>
    </form>
  </div>