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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="
https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js
">
</script>
	<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
    </head>
    <body class="font-sans antialiased">
        {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}
            <div class="navbar">
				@include('layouts.navigation')
			</div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                <div class="section">
                    <div class="moving-image"></div>
                    <div class="shadow-title">YouSabuyMansion</div>
                    <ul class="case-study-wrapper">
                        <li class="case-study-name">                            	
                            <a href="#" class="hover-target">bedroom</a>
                        </li>
                        <li class="case-study-name">                                         	
                            <a href="#" class="hover-target">bathroom</a>
                        </li>
                        <li class="case-study-name">                                        	
                            <a href="#" class="hover-target">balcony</a>
                        </li>
                        <li class="case-study-name">                                         	
                            <a href="#" class="hover-target">laundry</a>
                        </li>
                        <li class="case-study-name">                                         	
                            <a href="#" class="hover-target">overview</a>
                        </li>
                    </ul>
            
                    <ul class="case-study-images">
                        <li>
                            <img src="https://www.bogtui.com/wp-content/uploads/2021/06/18112019_9797-1536x1004.jpg" alt="">          	
                            <p>bedroom</p>
                            <div class="info">
                                <img src="https://cdn.iconfinder.com/stored_data/1263562/128/png?token=1694870193-BevHQyJrLdiSuCnKy9ZJ0%2Fv6TD17OP6tuUNsX%2FnqzxI%3D" alt=""> 	
                                <img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
                                <img src="https://cdn.iconfinder.com/stored_data/1263564/128/png?token=1694870256-4GOSMr0%2FDffEoWQyNU35gabEh0fPnpTe7kayJmUWQtw%3D" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
                                <a href="/reserve" class="hover-target">reserve</a>
                            </div>
                        </li>
                        <li>
                            <img src="https://www.bogtui.com/wp-content/uploads/2021/06/Restroom.jpg" alt="">       	
                            <p>bathroom</p>
                            <div class="info">
                                <img src="https://cdn.iconfinder.com/stored_data/1263562/128/png?token=1694870193-BevHQyJrLdiSuCnKy9ZJ0%2Fv6TD17OP6tuUNsX%2FnqzxI%3D" alt=""> 	
                                <img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
                                <img src="https://cdn.iconfinder.com/stored_data/1263564/128/png?token=1694870256-4GOSMr0%2FDffEoWQyNU35gabEh0fPnpTe7kayJmUWQtw%3D" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
                                <a href="/reserve" class="hover-target">reserve</a>
                            </div>
                        </li>
                        <li>
                            <img src="https://www.bogtui.com/wp-content/uploads/2021/06/balcony.jpg" alt="">       	
                            <p>balcony</p>
                            <div class="info">	
                                <img src="https://cdn.iconfinder.com/stored_data/1263562/128/png?token=1694870193-BevHQyJrLdiSuCnKy9ZJ0%2Fv6TD17OP6tuUNsX%2FnqzxI%3D" alt=""> 	
                                <img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
                                <img src="https://cdn.iconfinder.com/stored_data/1263564/128/png?token=1694870256-4GOSMr0%2FDffEoWQyNU35gabEh0fPnpTe7kayJmUWQtw%3D" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
                                <a href="/reserve" class="hover-target">reserve</a>
                            </div>
                        </li>
                        <li>
                            <img src="https://www.bogtui.com/wp-content/uploads/2021/06/washing_machine.jpg" alt="">       	
                            <p>laundry</p>
                            <div class="info">
                                <img src="https://cdn.iconfinder.com/stored_data/1263562/128/png?token=1694870193-BevHQyJrLdiSuCnKy9ZJ0%2Fv6TD17OP6tuUNsX%2FnqzxI%3D" alt=""> 	
                                <img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
                                <img src="https://cdn.iconfinder.com/stored_data/1263564/128/png?token=1694870256-4GOSMr0%2FDffEoWQyNU35gabEh0fPnpTe7kayJmUWQtw%3D" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
                                <a href="/reserve" class="hover-target">reserve</a>
                            </div>
                        </li>
                        <li>
                            <img src="https://www.bogtui.com/wp-content/uploads/2021/06/18112019_9896-1536x1012.jpg" alt="">          	
                            <p>overview</p>
                            <div class="info">
                                <img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
                                <img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
                                <img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
                                <a href="/reserve" class="hover-target">reserve</a>
                            </div>
                        </li>
                    </ul>				
                </div>
                <div class="reading-indicator"></div>
                
                <!-- Page cursor
                ================================================== -->
                
                <div class='cursor' id="cursor"></div>
                <div class='cursor2' id="cursor2"></div>
                <div class='cursor3' id="cursor3"></div> 
            
            <!-- Link to page
            ================================================== -->
            
            <a href="https://themeforest.net/user/ig_design/portfolio" class="link-to-portfolio hover-target" target="_blank"></a>
            <script lang="js">
                /* Please ❤ this if you like it! */
                
                
                (function($) { "use strict";
                        
                //Page cursors
            
                document.getElementsByTagName("body")[0].addEventListener("mousemove", function(n) {
                    t.style.left = n.clientX + "px", 
                    t.style.top = n.clientY + "px", 
                    e.style.left = n.clientX + "px", 
                    e.style.top = n.clientY + "px", 
                    i.style.left = n.clientX + "px", 
                    i.style.top = n.clientY + "px"
                });
                var t = document.getElementById("cursor"),
                    e = document.getElementById("cursor2"),
                    i = document.getElementById("cursor3");
                function n(t) {
                    e.classList.add("hover"), i.classList.add("hover")
                }
                function s(t) {
                    e.classList.remove("hover"), i.classList.remove("hover")
                }
                s();
                for (var r = document.querySelectorAll(".hover-target"), a = r.length - 1; a >= 0; a--) {
                    o(r[a])
                }
                function o(t) {
                    t.addEventListener("mouseover", n), t.addEventListener("mouseout", s)
                }
                
                var pos = 0;
                        window.setInterval(function(){
                            pos++;
                            document.getElementsByClassName('moving-image')[0].style.backgroundPosition = pos + "px 0px";
                        }, 18
                    );
                
                $(document).ready(function() {			
                    
                    $('.case-study-name:nth-child(1)').on('mouseenter', function() {
                        $('.case-study-name.active').removeClass('active');
                        $('.case-study-images li.show').removeClass("show");
                        $('.case-study-images li:nth-child(1)').addClass("show");
                        $('.case-study-name:nth-child(1)').addClass('active');
                    })
                    $('.case-study-name:nth-child(2)').on('mouseenter', function() {
                        $('.case-study-name.active').removeClass('active');
                        $('.case-study-images li.show').removeClass("show");
                        $('.case-study-images li:nth-child(2)').addClass("show");
                        $('.case-study-name:nth-child(2)').addClass('active');
                    })
                    $('.case-study-name:nth-child(3)').on('mouseenter', function() {
                        $('.case-study-name.active').removeClass('active');
                        $('.case-study-images li.show').removeClass("show");
                        $('.case-study-images li:nth-child(3)').addClass("show");
                        $('.case-study-name:nth-child(3)').addClass('active');
                    })
                    $('.case-study-name:nth-child(4)').on('mouseenter', function() {
                        $('.case-study-name.active').removeClass('active');
                        $('.case-study-images li.show').removeClass("show");
                        $('.case-study-images li:nth-child(4)').addClass("show");
                        $('.case-study-name:nth-child(4)').addClass('active');
                    })
                    $('.case-study-name:nth-child(5)').on('mouseenter', function() {
                        $('.case-study-name.active').removeClass('active');
                        $('.case-study-images li.show').removeClass("show");
                        $('.case-study-images li:nth-child(5)').addClass("show");
                        $('.case-study-name:nth-child(5)').addClass('active');
                    })
                    $('.case-study-name:nth-child(1)').trigger('mouseenter')
                                
                });
            
                })(jQuery); 
                    </script>
            </main>
        {{-- </div> --}}
    </body>
</html>
