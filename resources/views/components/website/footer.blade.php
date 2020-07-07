<div class="footer-top">
	<div class="container d-flex flex-column justify-content-center align-items-center">
		<div class="quick-links d-flex justify-content-around">
			<ul class="d-flex flex-column justify-content-between list-unstyled mx-5 my-0">
				<li><a href = "#"><h4>Facebook</h4></a></li>
				<li><a href = "#"><h4>Twitter</h4></a></li>
				<li><a href = "#"><h4>Youtube</h4></a></li>
			</ul>
			
			<ul class="d-flex flex-column justify-content-between list-unstyled mx-5 my-0">
				<li><a href = "#"><h4>Contact us</h4></a></li>
				<li><a href = "#"><h4>Events</h4></a></li>
				<li><a href = "#"><h4>News</h4></a></li>
			</ul>
			
			<ul class="d-flex flex-column justify-content-between list-unstyled mx-5 my-0">
				<li><a href = "#"><h4>Zoo Map</h4></a></li>
				<li><a href = "#"><h4>Opening Times</h4></a></li>
				<li><a href = "#"><h4>Become a Sponsor</h4></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="footer-bottom">
	<div class="container d-flex justify-content-between">
		{{--Footer bottom left column--}}
		<div class="d-flex flex-column justify-content-between">
			<ul class="policies d-flex justify-content-start list-unstyled">
				<li class="mx-2"><a href = "#">Privacy Policy</a></li>
				<li class="mx-2"><a href = "#">Terms and Conditions</a></li>
				<li class="mx-2"><a href = "#">Modern Slavery Act</a></li>
			</ul>

			<p>{{$zoo->name}}, {{$zoo->address['building_number'] ?? $zoo->address['building_number']}} {{$zoo->address['road_name'] ?? $zoo->address['road_name']}}, {{$zoo->address['city'] ?? $zoo->address['city']}}, {{$zoo->address['county'] ?? $zoo->address['county']}}, {{$zoo->address['postcode'] ?? $zoo->address['postcode']}}</p>
			
			<p>Registered Company No.{{$zoo['company_number'] ?? $zoo[0]['company_number']}}</p>
		</div>
		
		{{--Footer bottom right column--}}
		<div class="d-flex justify-content-between align-items-end">
			<p class="my-0 mr-3">Website designed and built by <strong>N.M.Ifrim <sup>TM</sup></strong></p>
			
			<img src="/images/website/brand/Logo-small-green.PNG" width="50" alt="Claybrook Logo">
		</div>
	</div>
</div>