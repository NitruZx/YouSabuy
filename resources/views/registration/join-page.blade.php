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
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <img src="../assets/image/rule.png"/>
        <input type="checkbox" id="rule" name="rule"  class="checkr" required>
        <label for="rule">คุณยืนยันที่จะยอมรับกฎนี้หรือไม่</label><br>

        <div class="btns-group">
            <a href="{{ url()->previous() }}" class="btn btn-prev ">Back</a>
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
          <a href="{{route('roomdetail')}}">
          <input type="submit" value="Submit" class="inline-block rounded bg-primary px-6 pb-3.5 pt-3.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
          </a>
        </div>
      </div>
    </form>

    @if(Session::has('message'))
    <script>
      swal("Error", "{{ Session::get('message') }}", 'error',{
        button:true,
        button:"oK",
      });
      </script>
    @endif

    @if(Session::has('success'))
    <script>
      swal("success", "{{ Session::get('success') }}", 'success',{
        button:true,
        button:"oK",
      });
      </script>
    @endif

    @filamentScripts
    @livewireScripts
  </body>
</html>