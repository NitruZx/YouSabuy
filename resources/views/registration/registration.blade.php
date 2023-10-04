<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/regis.css')}}" />
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/content/tables/#table-head-options"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/regis.js')}}" defer></script>
    <title>Registraion Form</title>
  </head>
  <body>    

    <form action="{{route('reg.addinfo')}}" method="post" class="form" >
      @csrf
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
        <div class="progress-step" data-title="success"></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <img src="../assets/image/testrule.jpg"/>
        <input type="checkbox" id="rule" name="rule"  class="checkr" required>
        <label for="rule">คุณยืนยันที่จะยอมรับกฎนี้หรือไม่</label><br>

        <div class="btns-group">
            <a href="/roomdetail" class="btn btn-prev ">Back</a>
            <a href="#" class="btn btn-next ">Next</a>
        </div>
      </div>

      <div class="form-step">
        <div>
          <div class="datetime">
            <label for="datetime">เลือกวันที่จะเข้าอาศัย:</label>
            <input class="form-control calendar" type="date" name="datecheckin" required>
          </div>
        </div>
        <div>
          
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Roomid</th>
                <th>floor</th>
                <th>Building</th>        
                <th>type</th>
                <th>Choose</th>       
              </tr>
            </thead>
            <tbody>
              @foreach( $rooms as $room)
              <tr>
                <td>{{ $room->room_id}}</td>
                <td>{{ $room->floor}}</td>
                <td>{{ $room->building}}</td>
                <td>{{ $room->type}}</td>
                <td>
                  <input type="radio" id="choose" name="choose" value={{$room->room_id}} required>
                </td>
              </tr> 
              @endforeach
            </tbody>    
          </table>
          
        </div>

        <br>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next" onclick="displayRadioValue()">Next</a>

        </div>
      </div>


      <div class="form-step">
        <h3>ท่านยืนยันจะเลือกห้อง</h3>
        <h4 id="chosen"></h4>

        <hr>
        <div class="input-group">
            <label for="fname">Firstname</label>
            <input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}" readonly placeholder="FirstName" />
            <label for="fname">Lastname</label>
            <input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}" readonly placeholder="Last Name" />
            <label for="fname">Phonenumber</label>
            <input type="text" name="phone" id="phone" value="{{Auth::user()->tel}}" readonly placeholder="Tel." />
            <label for="fname">Email</label>
            <input type="text" name="email" id="email" value="{{Auth::user()->email}}" readonly placeholder="Email" />
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <h1>มึงจะอยู่จริงๆใช่ไหม กด submit ซะ</h1>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" value="Submit" class="btn" onclick="comfirmation(event)" />
        </div>
      </div>
    </form>

    @if(Session::has('message'))
    <script>
      swal("Message", "{{ Session::get('message') }}", 'success',{
        button:true,
        button:"oK",

      });
      </script>


    @endif

  </body>
</html>