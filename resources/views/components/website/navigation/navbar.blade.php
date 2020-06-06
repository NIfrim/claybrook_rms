<nav class="navbar navbar-expand-lg navbar-dark bg-dark web-nav">
	<div class="container d-flex flex-lg-nowrap justify-content-between">
		{{-- Hamburger toggler --}}
		<button class="navbar-toggler order-sm-1" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"/>
		</button>
		
		<div class="collapse navbar-collapse flex-sm-column flex-lg-row justify-content-sm-center order-sm-2 order-lg-0" id="navbarContent">
			{{-- Website logo --}}
			<a class="navbar-brand" href="{{route('website.welcome')}}">
				<img src="/images/website/brand/Logo-small.PNG" id="logo" width="85" alt="Claybrook Logo">
			</a>
			
			{{-- Main nav buttons --}}
			<ul class="navbar-nav flex-sm-column-reverse flex-lg-row nav-buttons-wrapper justify-content-between list-unstyled align-self-lg-stretch align-items-lg-end align-items-sm-center m-0 flex-grow-1 px-5">
				
				{{-- Our zoo menu item --}}
				<li class="nav-item">
					<a href="#ourZooSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'our-zoo' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
						<h3 class="nav-item-text web-title">Our Zoo</h3>
					</a>
				</li>
				
				{{-- Experiences menu item --}}
				<li class="nav-item">
					<a href="#experiencesSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'experiences' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
						<h3 class="nav-item-text web-title">Experiences</h3>
					</a>
				</li>
				
				{{-- More info menu item --}}
				<li class="nav-item">
					<a href="#moreInfoSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'more-info' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
						<h3 class="nav-item-text web-title">More Info</h3>
					</a>
				</li>
				
				{{-- Tickets and sponsor buttons --}}
				<li class="nav-item">
					<ul class="navbar-nav d-flex flex-grow-1 my-3 flex-column align-self-stretch justify-content-between list-unstyled">
						<li id="buyTickets" class="d-flex flex-nowrap align-items-center">
							<a href = "{{route('website.ticketsAndPasses.show')}}" class="d-flex flex-nowrap">
								<span class="material-icons mr-2">local_activity</span>
								<h3 class="web-title my-0">Buy Tickets</h3>
							</a>
						</li>
						<li id="becomeSponsor" class="d-flex flex-nowrap align-items-center">
							<a href = "{{route('website.becomeASponsor.show')}}" class="d-flex flex-nowrap">
								<span class="material-icons mr-2">person_add</span>
								<h3 class="web-title my-0">Become a sponsor</h3>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		
		<ul class="d-flex order-sm-1 list-unstyled my-auto nav-icons-list">
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="material-icons nav-icon">account_circle</span>
				</a>
				
				<div class="dropdown-menu" aria-labelledby="accountDropdown">
					<a class="dropdown-item" href="#">Sponsor</a>
					<a class="dropdown-item" href="#">User</a>
				</div>
			</li>
			<li>
				<span class="material-icons nav-icon">shopping_cart</span>
			</li>
		</ul>
		
	</div>
</nav>

<div class="sub-menu-wrapper flex-shrink-1">
	{{-- Our zoo submenu --}}
	<ul class="collapse sub-menu-list flex-sm-column flex-lg-row container list-unstyled my-0 pb-lg-1 pb-sm-5" id="ourZooSubmenu">
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'birds' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.animals.show', ['type' => 'birds'])}}">
				<h4 class="menu-sub-item-text web-title">Birds</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'fish' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.animals.show', ['type' => 'fish'])}}">
				<h4 class="menu-sub-item-text web-title">Fish</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'mammals' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.animals.show', ['type' => 'mammals'])}}">
				<h4 class="menu-sub-item-text web-title">Mammals</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'reptiles' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.animals.show', ['type' => 'reptiles'])}}">
				<h4 class="menu-sub-item-text web-title">Reptiles</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'attractions' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.attractions.show')}}">
				<h4 class="menu-sub-item-text web-title">Attractions</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'opening-times' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.openingTimes.show')}}">
				<h4 class="menu-sub-item-text web-title">Opening Times</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="{{route('website.ourZoo.mapAndDirections.show')}}">
				<h4 class="menu-sub-item-text web-title">Map & Directions</h4>
			</a>
		</li>
	</ul>
	
	{{-- Experiences submenu --}}
	<ul class="collapse sub-menu-list flex-sm-column flex-lg-row container list-unstyled pb-lg-1 pb-sm-5" id="experiencesSubmenu">
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'games' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Games</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'events' ? 'active' : ''}}">
			<a href="{{route('website.experiences.events.show')}}">
				<h4 class="menu-sub-item-text web-title">Events</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'news' ? 'active' : ''}}">
			<a href="{{route('website.experiences.news.show')}}">
				<h4 class="menu-sub-item-text web-title">Latest News</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="{{route('website.experiences.mapAndDirections.show')}}">
				<h4 class="menu-sub-item-text web-title">Map & Directions</h4>
			</a>
		</li>
	</ul>
	
	{{-- More info submenu --}}
	<ul class="collapse sub-menu-list flex-sm-column flex-lg-row container list-unstyled pb-lg-1 pb-sm-5 list-unstyled" id="moreInfoSubmenu">
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'about-us' ? 'active' : ''}}">
			<a href="{{route('website.moreInfo.aboutUs.show')}}">
				<h4 class="menu-sub-item-text web-title">About Us</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'contact-details' ? 'active' : ''}}">
			<a href="{{route('website.moreInfo.contactDetails.show')}}">
				<h4 class="menu-sub-item-text web-title">Contact Details</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'reviews' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Reviews</h4>
			</a>
		</li>
		<li class="menu-sub-item mb-lg-5 my-sm-1 {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="">
				<h4 class="menu-sub-item-text web-title">Map & Directions</h4>
			</a>
		</li>
	</ul>
</div>