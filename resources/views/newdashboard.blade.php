<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouSabuy</title>
  <link rel="stylesheet" href="{{url('css/welcum.css')}}">

  <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @livewireStyles
        @filamentStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      
        @include('layouts.newnavigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
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
  <header id="Introduction">
    {{-- <nav>
      <p><a href="#" id="openRooms">profile</a></p>
      <ul id="mainNav">
        <li><a href="{{url('roomdetail')}}">Room</a></li>
        <li><a href="#">Pay</a></li>
        <li><a href="#">Report</a></li>
        <li><a href="#">Cancel</a></li>

      </ul>
    </nav> --}}

    <section class="slideSection" id="mainSection">
      <h2>Welcome to YouSabuyMansion</h2>
      <p>นิยามที่แท้จริงของอพาร์ตเมนท์ยุคใหม่ ที่คุณไม่ควรพลาด!!
        <br /> การออกแบบที่เฉียบทุกมุมมอง ผสานการออกแบบภายในและภายนอก 
        <br />เพื่อการพักอาศัยอย่างลงตัว สัมผัสความแตกต่างอย่างมีสไตล์
        <br />
      </p>

    </section>

  </header>

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
  @filamentScripts
  @livewireScripts
</body>

</html>