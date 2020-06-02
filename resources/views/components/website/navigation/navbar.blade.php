<nav class="navbar navbar-dark bg-dark web-nav">
	<div class="container d-flex flex-nowrap justify-content-between">
		{{-- Website logo --}}
		<a class="navbar-brand" href="{{route('website.welcome')}}">
			<img src="/images/website/brand/Logo-small.PNG" width="85" alt="Claybrook Logo" loading="lazy">
		</a>
		
		{{-- Main nav buttons --}}
		<ul class="nav-buttons-wrapper d-flex justify-content-between list-unstyled align-self-stretch align-items-end m-0 flex-grow-1 px-5">
			
			{{-- Our zoo menu item --}}
			<li class="menu-item">
				<a href="#ourZooSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'our-zoo' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
					<h3 class="menu-item-text web-title">Our Zoo</h3>
				</a>
			</li>
			
			{{-- Experiences menu item --}}
			<li class="menu-item">
				<a href="#experiencesSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'experiences' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
					<h3 class="menu-item-text web-title">Experiences</h3>
				</a>
			</li>
			
			{{-- More info menu item --}}
			<li class="menu-item">
				<a href="#moreInfoSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'more-info' ? 'true' : 'false'}}" class="nav-link d-flex flex-nowrap justify-content-between web-nav-btn">
					<h3 class="menu-item-text web-title">More Info</h3>
				</a>
			</li>
		</ul>
		
		{{-- Tickets and sponsor buttons --}}
		<ul class="d-flex flex-grow-1 my-3 flex-column align-self-stretch justify-content-between list-unstyled">
			<li id="buyTickets" class="d-flex flex-nowrap align-items-center">
				<span class="material-icons mr-2">local_activity</span>
				<h3 class="web-title my-0">Buy Tickets</h3>
			</li>
			<li id="becomeSponsor" class="d-flex flex-nowrap align-items-center">
				<span class="material-icons mr-2">person_add</span>
				<h3 class="web-title my-0">Become a Sponsor</h3>
			</li>
		</ul>
		
		<ul class="list-unstyled d-flex my-auto nav-icons-list">
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="material-icons">account_circle</span>
				</a>
				
				<div class="dropdown-menu" aria-labelledby="accountDropdown">
					<a class="dropdown-item" href="#">Sponsor</a>
					<a class="dropdown-item" href="#">User</a>
				</div>
			</li>
			<li>
				<span class="material-icons">shopping_cart</span>
			</li>
		</ul>
		
	</div>
</nav>

<div class="sub-menu-wrapper flex-shrink-1">
	{{-- Our zoo submenu --}}
	<ul class="collapse sub-menu-list container list-unstyled my-0 {{$category === 'our-zoo' ? 'show' : ''}}" id="ourZooSubmenu">
		<li class="menu-sub-item {{$subcategory === 'birds' ? 'active' : ''}}">
			<a href="{{route('website.animals.show', ['type' => 'birds'])}}">
				<h4 class="menu-sub-item-text web-title">Birds</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'fish' ? 'active' : ''}}">
			<a href="{{route('website.animals.show', ['type' => 'fish'])}}">
				<h4 class="menu-sub-item-text web-title">Fish</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'mammals' ? 'active' : ''}}">
			<a href="{{route('website.animals.show', ['type' => 'mammals'])}}">
				<h4 class="menu-sub-item-text web-title">Mammals</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'reptiles' ? 'active' : ''}}">
			<a href="{{route('website.animals.show', ['type' => 'reptiles'])}}">
				<h4 class="menu-sub-item-text web-title">Reptiles</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'attractions' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Attractions</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'opening-times' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Opening Times</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Map & Directions</h4>
			</a>
		</li>
	</ul>
	
	{{-- Experiences submenu --}}
	<ul class="collapse sub-menu-list container list-unstyled {{$category === 'experiences' ? 'show' : ''}}" id="experiencesSubmenu">
		<li class="menu-sub-item {{$subcategory === 'games' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Games</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'events' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Events</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'news' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Latest News</h4>
			</a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="#">
				<h4 class="menu-sub-item-text web-title">Map & Directions</h4>
			</a>
		</li>
	</ul>
	
	{{-- More info submenu --}}
	<ul class="collapse sub-menu-list container list-unstyled {{$category === 'more-info' ? 'show' : ''}} list-unstyled" id="moreInfoSubmenu">
		<li class="menu-sub-item {{$subcategory === 'about-us' ? 'active' : ''}}">
			<a href="#"><h4 class="menu-sub-item-text web-title">About Us</h4></a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'contact-details' ? 'active' : ''}}">
			<a href="#"><h4 class="menu-sub-item-text web-title">Contact Details</h4></a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'reviews' ? 'active' : ''}}">
			<a href="#"><h4 class="menu-sub-item-text web-title">Reviews</h4></a>
		</li>
		<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
			<a href="#"><h4 class="menu-sub-item-text web-title">Map & Directions</h4></a>
		</li>
	</ul>
</div>