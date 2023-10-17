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
            <a href="/roomdetail" class="btn btn-prev ">Back</a>
            <a href="#" class="btn btn-next ">Next</a>
        </div>
      </div>
    
</body>
</html>