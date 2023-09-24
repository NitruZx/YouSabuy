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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="popup1" class="overlay">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                                  <img class="logo" src="https://cdn.discordapp.com/attachments/1009383844983619604/1153650585376133210/a6bbf00593af813c.png" width="200" height="200">
                                    <p class="name">
                                      <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
                                    </p>
                                    
                                    <p class="email">
                                      <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
                                    </p>
                                    
                                    <p class="text">
                                      <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
                                    </p>
                                    <p class="datetime">
                                      <label for="datetime">Choose Time:</label>
                                      <input type="datetime-local" id="datetime" name="datetime">
                                      <input type="submit" value="send" id="button">
                                    </p>
                            
                                    <div class="submit">
                                      <input type="submit" value="SEND" id="button-blue"/>
                                      <div class="ease"></div>
                                    </div>
                          
                        </div>
                    </div>
              
                    <div id="icon-wrapper">
                        <a href="#popup1">
                            <div class="icons">
                                <div class="icon-slide-container">
                                    <img class="slide-icon"  alt="The Kite Map Logo" height="100" src="assets/image/admin.jpg">
                                </div>
                            </div>
                        </a>
                        
                        
                        <a href="#popup1">
                            <div class="icons2">
                                <div class="icon-slide-container">
                                    <img class="slide-icon"  alt="The Kite Map Logo" height="100" src="assets/image/clean.jpg">
                                </div>
                            </div>
                        </a>     
            
                        <a href="#popup1">
                            <div class="icons3">
                                <div class="icon-slide-container">
                                      <img class="slide-icon"  alt="The Kite Map Logo" height="100" src="assets/image/repair.jpg">
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
                    
                        <!-- Tabs navs -->
                        
<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex1-tab-1"
        data-mdb-toggle="tab"
        href="#ex1-tabs-1"
        role="tab"
        aria-controls="ex1-tabs-1"
        aria-selected="true"
        >Report</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex1-tab-2"
        data-mdb-toggle="tab"
        href="#ex1-tabs-2"
        role="tab"
        aria-controls="ex1-tabs-2"
        aria-selected="false"
        >Repair request</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex1-tab-3"
        data-mdb-toggle="tab"
        href="#ex1-tabs-3"
        role="tab"
        aria-controls="ex1-tabs-3"
        aria-selected="false"
        >Maid call</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->
  
  <!-- Tabs content -->
  <div class="tab-content" id="ex1-content">
    <div
      class="tab-pane fade show active"
      id="ex1-tabs-1"
      role="tabpanel"
      aria-labelledby="ex1-tab-1"
    >
      @include('Client.Inform.report')
    </div>
    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
        @include('Client.Inform.repair-request')
    </div>
    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
        @include('Client.Inform.maidcall')
    </div>
  </div>
  <!-- Tabs content -->
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
