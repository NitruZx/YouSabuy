<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{url('css/iconbutton.css')}}">
        <link rel="stylesheet" href="{{url('css/showpopup.css')}}">
        <link rel="stylesheet" href="{{url('css/pop_up_report.css')}}">

        
        <!-- Scripts -->
        <style>
          [x-cloak] {
              display: none !important;
          }
      </style>
        @livewireStyles
        @filamentStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- click 1 --}}
                    
                    
                    <div id="popup1" class="overlay">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                                  <img class="logo" src="https://cdn.discordapp.com/attachments/1009383844983619604/1153650585376133210/a6bbf00593af813c.png" width="200" height="200">
                                <form action="{{route('reporttext')}}" method="post">
                                      @csrf

                                    <p class="name">
                                      <label >Name:</label>
                                      <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name"
                                      value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}"/>
                                    </p>
                                    <p class="room">
                                      <label >Room: </label> <br/>
                                      <input name="romm" type="text" class="" placeholder="Name" id="name"value="{{Auth::user()->room_id}} "/>
                                    </p>
                                      
                                    <p class="text">
                                      <label >ปัญหา:</label>
                                      <textarea name="reporttext" class="validate[required,length[6,300]] feedback-input" id="report-text" placeholder="Report text"></textarea>
                                    </p>

                                    <div class="submit">
                                      <button type="submit" value="REPORT" id="button-blue">SEND</button>
                                      <div class="ease"></div>
                                    </div>
                                </form>
                        </div>
                    </div>
                  
                    {{-- click 2--}}
                    <div id="popup2" class="overlay">
                      <a class="cancel" href="#"></a>
                      <div class="popup">
                                <img class="logo" src="https://cdn.discordapp.com/attachments/1009383844983619604/1153650585376133210/a6bbf00593af813c.png" width="200" height="200">
                                  <p class="name">
                                    <label >Name:</label>
                                    <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" 
                                    value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}"/>
                                  </p>
                                  <p class="room">
                                    <label >Room: </label> <br/>
                                    <input name="romm" type="text" class="" placeholder="Name" id="name"value="{{Auth::user()->room_id}} "/>
                                  </p>
                                  <p class="datetime">
                                    <label for="datetime">เลือกเวลาที่จะทำความสะอาด:</label>
                                    <input type="datetime-local" id="datetime" name="datetime">
                                  
                                  </p>
                
                                  <div class="submit">
                                    <input type="submit" value="SEND" id="button-blue"/>
                                    <div class="ease"></div>
                                  </div>
                        
                      </div>
                  </div>
                  {{-- click 3--}}

                  <div id="popup3" class="overlay">
                    <a class="cancel" href="#"></a>
                    <div class="popup">
                              <img class="logo" src="https://cdn.discordapp.com/attachments/1009383844983619604/1153650585376133210/a6bbf00593af813c.png" width="200" height="200">
                              <form action="{{route('repairtext')}}" method="post">
                                @csrf

                                <p class="name">
                                  <label >Name:</label>
                                  <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" name="fname" 
                                  id="name" value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}" /> 
                                </p>
                                <label >Room:</label> <br/>
                                <input name="romm" type="text" class="" placeholder="Name" id="name"value="{{Auth::user()->room_id}}"/>
                                
                                </p>
                                <p class="text">
                                  <label >อาการ/ปัญหา:</label>
                                  <textarea name="repairtext" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
                                </p>
                              
                                <div class="submit">
                                  <button type="submit" value="SEND" id="button-blue">SEND</button>
                                  <div class="ease"></div>
                                </div>
                            </form>

                    </div>
                </div>
              
                    <div id="icon-wrapper">
                        <a href="#popup1">
                            <div class="icons">
                                <div class="icon-slide-container">
                                    <img class="slide-icon"  alt="The Kite Map Logo" height="100" 
                                    src="https://cdn.discordapp.com/attachments/1051918929037119498/1155152052356386916/contact.png">
                                </div>
                            </div>
                        </a>
                        
                        
                        <a href="#popup2">
                            <div class="icons2">
                                <div class="icon-slide-container">
                                    <img class="slide-icon"  alt="The Kite Map Logo" height="100" 
                                    src="https://cdn.discordapp.com/attachments/1051918929037119498/1155152052104724510/cleaning.png">
                                </div>
                            </div>
                        </a>     
            
                        <a href="#popup3">
                            <div class="icons3">
                                <div class="icon-slide-container">
                                      <img class="slide-icon"  alt="The Kite Map Logo" height="100" 
                                      src="https://cdn.discordapp.com/attachments/1051918929037119498/1155152052620632146/repair2.png">
                                </div>
                            </div>
                        </a>
                    </div>
            
                    </div>
                </div>
            </div>
        </div>
        <div class="py-7">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div
    class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
    <h2 class="mb-0" id="headingOne5">
      <button
        class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
        type="button"
        data-te-collapse-init
        data-te-target="#collapseOne5"
        aria-expanded="true"
        aria-controls="collapseOne5">
        Inform History
        <span
          class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
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
              d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
      </button>
    </h2>
    <div
      id="collapseOne5"
      class="!visible"
      data-te-collapse-item
      data-te-collapse-show
      aria-labelledby="headingOne5">
      <!-- Tabs navs -->
                        <ul
                        class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0"
                        role="tablist"
                        data-te-nav-ref>
                        <li role="presentation" class="flex-grow basis-0 text-center">
                          <a
                            href="#tabs-home02"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill"
                            data-te-target="#tabs-home02"
                            data-te-nav-active
                            role="tab"
                            aria-controls="tabs-home02"
                            aria-selected="true"
                            >Report</a
                          >
                        </li>
                        <li role="presentation" class="flex-grow basis-0 text-center">
                          <a
                            href="#tabs-profile02"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill"
                            data-te-target="#tabs-profile02"
                            role="tab"
                            aria-controls="tabs-profile02"
                            aria-selected="false"
                            >Repair Request</a
                          >
                        </li>
                        <li role="presentation" class="flex-grow basis-0 text-center">
                          <a
                            href="#tabs-messages02"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill"
                            data-te-target="#tabs-messages02"
                            role="tab"
                            aria-controls="tabs-messages02"
                            aria-selected="false"
                            >Maid Call</a
                          >
                        </li>
                      </ul>
                      
                      <!--Tabs content-->
                      <div class="mb-6">
                        <div
                          class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                          id="tabs-home02"
                          role="tabpanel"
                          aria-labelledby="tabs-home-tab02"
                          data-te-tab-active>
                          @include('Client.Inform.report')
                        </div>
                        <div
                          class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                          id="tabs-profile02"
                          role="tabpanel"
                          aria-labelledby="tabs-profile-tab02">
                          @include('Client.Inform.repair-request')
                        </div>
                        <div
                          class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                          id="tabs-messages02"
                          role="tabpanel"
                          aria-labelledby="tabs-profile-tab02">
                          @include('Client.Inform.maidcall')
                        </div>
    </div>
  </div>
                        
  <!-- Tabs content -->
                </div>
            </div>
        </div>
        </div>
        @filamentScripts
        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>
