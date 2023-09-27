<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/regis.css')}}" />
    <script src="{{ asset('js/regis.js')}}" defer></script>
    
    <title>Registraion Form</title>
  </head>
  <body>
    <form action="#" class="form">
      <h1 class="text-center">Registration</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title="Rule"
        ></div>
        <div class="progress-step" data-title="Room"></div>
        <div class="progress-step" data-title="Checking"></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group">
            <img src="../assets/image/testrule.jpg"/>
            <input type="checkbox" id="acceptrule" name="rule"  class="checkr" required>
            <label for="rule">คุณยืนยันที่จะยอมรับกฎนี้หรือไม่</label><br>
        </div>

        <div class="btns-group">
            <a href="/roomdetail" class="btn btn-prev ">Back</a>
            <a href="#" class="btn btn-next ">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div>
            <select name="room" id="room">
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
              </select>
              
        </div><br>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <h1>ท่านยืนยันจะเลือกห้อง</h1>
        <hr>
        <div class="input-group">
            <label for="fname">Firstname</label>
            <input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}" readonly placeholder="FirstName" />
            <br>
            <label for="fname">Lastname</label>
            <input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}" readonly placeholder="Last Name" />
            <br>
            <label for="fname">Phonenumber</label>
            <input type="text" name="phone" id="phone" value="{{Auth::user()->tel}}" readonly placeholder="Tel." />
            <br>
            <label for="fname">Email</label>
            <input type="text" name="email" id="email" value="{{Auth::user()->email}}" readonly placeholder="Email" />
            <br>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" value="Submit" class="btn" />
        </div>
      </div>
    </form>
  </body>
</html>