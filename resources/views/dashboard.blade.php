@extends('layouts.client-layout')
@section('header')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="{{url('css/welcum.css')}}">
@endsection

@section('content')
  <!--This is perhaps one of my first nice looking websites that I have made. (Criticism is welcome so that I can learn about different techniques or mistakes I have made) -->

  <!-- The image that I provide is only a backup image. If anyone could help me find a way to upload images here that would be awesome!
  -->

  <!--Originally I made a PHP back-end that included a functional and visual room reservation system
  and a virtual tour with WebGl (Babylon.js)but I'm not sure whether you can make a PHP back-end in Codepen-->

  <!--Right now I'm working on another site "Joe's Pizza" but for this current site I plan to add a "slideshow" to #mainSection-->
  <!-- <section id="logIn">
    <div id="LOGIN" class="form-style-6">
      <h3>Log In</h3>
      <form action="Ipsum.php" method="post">
        <input type="text" name="field1" placeholder="Name" />
        <input type="email" name="field2" placeholder="Email Address" />
        <input type="password" name="field3" placeholder="Password" />
        <input type="submit" value="Submit" />
      </form>
      <p id="backButton"><a href="#form">Don't have an account? Sign up now!</a></p>
    </div>
  </section> -->
  <div
    class="relative overflow-hidden bg-cover bg-no-repeat drop-shadow-2xl"
    style="
      background-position: 50%;
      background-image: url('../assets/image/bg.jpg');
      height: 500px;
    ">
    <div
      class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.50)">
      <div class="flex h-full items-center justify-center">
        <div class="px-6 text-center text-white md:px-12">
          <h1 class="mb-6 text-5xl font-bold">Welcome to YouSabuyMansion</h1>
          <h3 class="mb-8 text-3xl font-bold">นิยามที่แท้จริงของอพาร์ตเมนท์ยุคใหม่ ที่คุณไม่ควรพลาด!!</h3>
              @auth
              @if (Auth::user()->role === 'guest' && !$isreg)
              <a
              type="button" href="{{route('regpage')}}"
              class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
              data-te-ripple-init
              data-te-ripple-color="light">
              reserve now
              </a>
              @else
                @livewire('status-card')
                @if(Session::has('success'))
                <script>
                  swal("success", "{{ Session::get('success') }}", 'success',{
                    button:true,
                    button:"oK",
                  });
                </script>
                @endif
              @endif
              @endauth
              @guest
                 <button
            type="button"
            class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init
            data-te-ripple-color="light">
            reserve now
          </button> 
              @endguest
            
          
          
        </div>
      </div>
    </div>
  </div>
  <div id="blurBg"></div>
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
                  data-te-slide-to="1"
                  class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                  aria-label="Slide 2"></button>
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
                    src="assets/image/bedroom.jpg"
                    class="block w-full"
                    alt="Wild Landscape" />
                </div>
                <!--Second item-->
                <div
                  class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                  data-te-carousel-fade
                  data-te-carousel-item>
                  <img
                    src="https://cdn.discordapp.com/attachments/1010817962300674058/1159518553142198372/The-Garden-Condo-Residences.jpg?ex=653150cd&is=651edbcd&hm=5ba922318cc2f383e6d156bda7d4caeea4e7382aa14c0aa62647f7fc07fc5e03&"
                    class="block w-full"
                    alt="Camera" />
                </div>
                <!--Third item-->
                <div
                  class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                  data-te-carousel-fade
                  data-te-carousel-item>
                  <img
                    src="assets/image/laundry.jpg"
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
  {{-- <header id="Introduction"> --}}
    {{-- <nav>
      <p><a href="#" id="openRooms">profile</a></p>
      <ul id="mainNav">
        <li><a href="{{url('roomdetail')}}">Room</a></li>
        <li><a href="#">Pay</a></li>
        <li><a href="#">Report</a></li>
        <li><a href="#">Cancel</a></li>

      </ul>
    </nav> --}}

    {{-- <section class="slideSection" id="mainSection">
      <h2>Welcome to YouSabuyMansion</h2>
      <p>นิยามที่แท้จริงของอพาร์ตเมนท์ยุคใหม่ ที่คุณไม่ควรพลาด!!
        <br /> การออกแบบที่เฉียบทุกมุมมอง ผสานการออกแบบภายในและภายนอก 
        <br />เพื่อการพักอาศัยอย่างลงตัว สัมผัสความแตกต่างอย่างมีสไตล์
        <br />
      </p>

    </section> --}}

  {{-- </header> --}}

  <!-- <section id="travelSection">

    <h2>Come look at our most luxurious hotels around the country.</h2>

    <div class="placeToGo" id="Chicago">

      <h3>Chicago</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

    <div class="placeToGo" id="Broadway">
      <h3>Boston</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

    <div class="placeToGo" id="Dallas">
      <h3>Dallas</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

    <div class="placeToGo" id="Montreal">

      <h3>Montreal</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

    <div class="placeToGo" id="Manhattan">

      <h3>New York City</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

    <div class="placeToGo" id="Washington D.C.">
      <h3>Washington D.C.</h3>
      <p>Lorem Ipsum sit Amet
        <br /> consectetur adipiscing elit.
        <br /> Donec eu. </p>
    </div>

  </section>
  <div class="form-style-6" id="form">
    <h3>Sign up</h3>
    <form action="Ipsum.php" method="post">
      <input type="text" name="field1" placeholder="First Name" />
      <input type="text" name="field1" placeholder="Last Name" />
      <input type="email" name="field2" placeholder="Email Address" />
      <input type="password" name="field3" placeholder="Password" />
      <textarea name="field4" placeholder="Type your Message"></textarea>
      <input type="submit" value="Send" />
    </form>
  </div> -->
  
<footer class="bg-white rounded-lg">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
          <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
            <p>Email : Nakhan@gmail.com <br>
              Contact : 095-502-6656 (Nakhan Ponboon)</p>
            </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">YouSabuyMansion</a>. All Rights Reserved.</span>
  </div>
</footer>

@endsection