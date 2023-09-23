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
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
	<link  rel="stylesheet" href="{{ asset('css/reserve.css')}}">
	<link  rel="stylesheet" href="{{ asset('css/showpopup.css')}}">
	
    </head>

    <body class="font-sans antialiased">
        {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}
            <div class="navbar">
				@include('layouts.navigation')
			</div>

			<div id="popup_reserve" class="overlay">
				<a class="cancel" href="#"></a>
				<div class="popup">	
					<div class="testbox">
						<h1>Reservation</h1>
					  
						<form action="/addinfo" method="post">
					  
						  @csrf
						<hr>
						<label id="icon" for="fname"><i class="icon-user"></i></label>
						<input type="text" name="fname" id="fname" placeholder="FirstName"/>
						<br>
						<label id="icon" for="lname"><i class="icon-user"></i></label>
						<input type="text" name="lname" id="lname" placeholder="Last Name"/>
						<br>
						<label id="icon" for="phone"><i class="icon-phone "></i></label>
						<input type="text" name="phone" id="phone" placeholder="Tel.">
						<br>
						<label id="icon" for="email"><i class="icon-envelope "></i></label>
						<input type="text" name="email" id="email" placeholder="Email">
						<br>
						<div class="datetime">
						  <label for="datetime">Choose Date(in):</label>
						  <input class="form-control calendar" type="date" name="datecheckin">
						</div>
						<input type="text" name="bankaccount" id="name" placeholder="Bank Account" />
						<br>
						<label for="Room_id">Choose your room:</label>
						<select id="Room_id">
						  <option value="A101">A101</option>
						  <option value="A102">A102</option>
						  <option value="A103">A103</option>
						  <option value="A104">A104</option>
						  <option value="A201">A201</option>
						  <option value="A202">A202</option>
						  <option value="A203">A203</option>
						  <option value="A204">A204</option>
						  <option value="B101">B101</option>
						  <option value="B102">B102</option>
						  <option value="B103">B103</option>
						  <option value="B104">B104</option>
						  <option value="B201">B201</option>
						  <option value="B202">B202</option>
						  <option value="B203">B203</option>
						  <option value="B204">B204</option>
						</select>
							<button type="submit" class="button">Reserve</button>
							<button class="button">Cancel</button>
						</form>
					  </div>
				</div>
			</div>

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
			<li class="case-study-name">                                         	
				<a href="#" class="hover-target">information</a>
			</li>
		</ul>

		<ul class="case-study-images">
			<li>
				<img src="assets/image/bedroom.jpg" alt="">          	
				<p>bedroom</p>
				<div class="info">
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve" class="hover-target">reserve</a>
				</div>
			</li>
			<li>
				<img src="assets/image/bathroom.jpg" alt="">       	
				<p>bathroom</p>
				<div class="info">
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve" class="hover-target">reserve</a>
				</div>
			</li>
			<li>
				<img src="assets/image/balcony.jpg" alt="">       	
				<p>balcony</p>
				<div class="info">	
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve" class="hover-target">reserve</a>
				</div>
			</li>
			<li>
				<img src="assets/image/laundry.jpg" alt="">       	
				<p>laundry</p>
				<div class="info">
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve" class="hover-target">reserve</a>
				</div>
			</li>
			<li>
				<img src="assets/image/living.jpg" alt="">          	
				<p>overview</p>
				<div class="info">
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve" class="hover-target">reserve</a>
				</div>
			</li>
			<li>
				<img src="assets/image/detail.jpg" alt="">          	
				<p>information</p>
				<div class="info">
					<img src="https://ivang-design.com/svg-load/hotel/1.svg" alt=""> 	
					<img src="https://ivang-design.com/svg-load/hotel/2.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/3.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/4.svg" alt=""> 
					<img src="https://ivang-design.com/svg-load/hotel/6.svg" alt="">
					<a href="#popup_reserve " class="hover-target">reserve</a>
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
		$('.case-study-name:nth-child(6)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(6)').addClass("show");
			$('.case-study-name:nth-child(6	)').addClass('active');
		})
		$('.case-study-name:nth-child(1)').trigger('mouseenter')
					
	});

	})(jQuery); 
		</script>
</body>
</html>		
 		
