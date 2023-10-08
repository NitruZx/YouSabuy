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

      <div class="form-step">
        <div>
          <div class="datetime">
            <label for="datetime">เลือกวันที่จะเข้าอาศัย:</label>
            <input class="form-control calendar" type="date" name="datecheckin" required>
          </div>
        </div>

        <div>
          <div class="max-w-4xl mx-auto my-10 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div
              id="carouselExampleCrossfade"
              class="relative"
              data-te-carousel-init
              data-te-ride="carousel">
              <!--Carousel indicators-->
              <div
                class="absolute inset-x-0 bottom-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                data-te-carousel-indicators>
                <button
                  type="button"
                  data-te-target="#carouselExampleCrossfade"
                  data-te-slide-to="0"
                  data-te-carousel-active
                  class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                  aria-current="true"
                  aria-label="Slide 1"></button>
                <button
                  type="button"
                  data-te-target="#carouselExampleCrossfade"
                  data-te-slide-to="2"
                  class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                  aria-label="Slide 3"></button>
              </div>
            
              <!--Carousel items-->
              <div
                class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                <!--First item-->
                <div
                  class="relative float-left -mr-[100%] w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                  data-te-carousel-fade
                  data-te-carousel-item
                  data-te-carousel-active>
                  <img
                    src="assets/image/building1.png"
                    class="block w-full"
                    alt="Wild Landscape" />
                </div>
                <!--Second item-->
                <div
                  class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                  data-te-carousel-fade
                  data-te-carousel-item>
                  <img
                    src="assets/image/building2.png"
                    class="block w-full"
                    alt="Exotic Fruits" />
                </div>
              </div>
            
              <!--Carousel controls - prev item-->
              <button
                class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button"
                data-te-target="#carouselExampleCrossfade"
                data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15.75 19.5L8.25 12l7.5-7.5" />
                  </svg>
                </span>
                <span
                  class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                  >Previous</span
                >
              </button>
              <!--Carousel controls - next item-->
              <button
                class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button"
                data-te-target="#carouselExampleCrossfade"
                data-te-slide="next">
                <span class="inline-block h-8 w-8">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>
                </span>
                <span
                  class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                  >Next</span
                >
              </button>
            </div>
            </div>
        </div>
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