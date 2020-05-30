<nav class="navbar navbar-dark bg-dark">
	<div class="container d-flex flex-nowrap justify-content-between">
		{{-- Website logo --}}
		<a class="navbar-brand" href="#">
			<img src="/images/website/brand/Logo-small.PNG" width="85" alt="Claybrook Logo" loading="lazy">
		</a>
		
		{{-- Main nav buttons --}}
		<ul class="d-flex justify-content-start" list-unstyled>
			
			{{-- Our zoo menu item --}}
			<li class="menu-item">
				<a href="#ourZooSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'our-zoo' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
					<span class="menu-item-text">Our Zoo</span>
				</a>
				
				{{-- Our zoo submenu --}}
				<ul class="collapse list-unstyled {{$category === 'our-zoo' ? 'show' : ''}} list-unstyled" id="ourZooSubmenu">
					<li class="menu-sub-item {{$subcategory === 'birds' ? 'active' : ''}}">
						<a href="{{route('website.animals.show', ['type' => 'birds'])}}"><span class="menu-sub-item-text">Birds</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'fish' ? 'active' : ''}}">
						<a href="{{route('website.animals.show', ['type' => 'fish'])}}"><span class="menu-sub-item-text">Fish</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'mammals' ? 'active' : ''}}">
						<a href="{{route('website.animals.show', ['type' => 'mammals'])}}"><span class="menu-sub-item-text">Mammals</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'reptiles' ? 'active' : ''}}">
						<a href="{{route('website.animals.show', ['type' => 'reptiles'])}}"><span class="menu-sub-item-text">Reptiles</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'attractions' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Attractions</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'opening-times' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Opening Times</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Map & Directions</span></a>
					</li>
				</ul>
			</li>
			
			{{-- Experiences menu item --}}
			<li class="menu-item">
				<a href="#experiencesSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'our-zoo' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
					<span class="menu-item-text">Experiences</span>
				</a>
				
				{{-- Experiences submenu --}}
				<ul class="collapse list-unstyled {{$category === 'experiences' ? 'show' : ''}} list-unstyled" id="experiencesSubmenu">
					<li class="menu-sub-item {{$subcategory === 'games' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Games</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'events' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Events</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'news' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Latest News</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Map & Directions</span></a>
					</li>
				</ul>
			</li>
			
			{{-- More info menu item --}}
			<li class="menu-item">
				<a href="#moreInfoSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'our-zoo' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
					<span class="menu-item-text">More Info</span>
				</a>
				
				{{-- Experiences submenu --}}
				<ul class="collapse list-unstyled {{$category === 'more-info' ? 'show' : ''}} list-unstyled" id="moreInfoSubmenu">
					<li class="menu-sub-item {{$subcategory === 'about-us' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">About Us</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'contact-details' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Contact Details</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'reviews' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Reviews</span></a>
					</li>
					<li class="menu-sub-item {{$subcategory === 'map-and-directions' ? 'active' : ''}}">
						<a href="#"><span class="menu-sub-item-text">Map & Directions</span></a>
					</li>
				</ul>
			</li>
		</ul>
		
		{{-- Tickets and sponsor buttons --}}
		<ul class="d-flex flex-column justify-content-start list-unstyled">
			<li id="buyTickets"><span>Icon</span><h2>Buy Tickets</h2></li>
			<li id="becomeSponsor"><span>Icon</span><h2>Become a Sponsor</h2></li>
		</ul>
		
		{{-- Search account and shopping --}}
		<ul class="d-flex flex-nowrap justify-content-between list-unstyled">
			{{-- Search menu action --}}
			<li id="search" class="menu-item">
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</li>
			
			{{-- Account menu item --}}
			<li id="account" class="menu-item">
				<div class="dropdown">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Account Area
					</a>
					
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#">Users</a>
						<a class="dropdown-item" href="#">Sponsors</a>
					</div>
				</div>
			</li>
			
			{{-- Shopping cart menu item --}}
			<li id="cart" class="menu-item">
				<a href="#" data-toggle="collapse" class="d-flex flex-nowrap justify-content-between">
					<span class="menu-item-text">Cart</span>
				</a>
			</li>
		</ul>
	</div>
</nav>