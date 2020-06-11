<div class="d-flex flex-column justify-content-start align-items-center">
	
	<a class="d-flex align-self-start">
		<span class="material-icons text-secondary">description</span>
		<h4 class="ml-2 text-secondary text-underline-secondary cursor-pointer">Read our sponsorship policy.</h4>
	</a>
	
	<h4 class="p-2 text-secondary">Each of our animals have a specific sponsorship band:</h4>
	
		{{--Sponsorship bands table--}}
		<table class="table">
			<thead class="thead-light">
			<tr>
				<th scope="col" class="text-center">Band</th>
				<th scope="col" class="text-center">Price</th>
				<th scope="col" class="text-center">Period</th>
			</tr>
			</thead>
			
			<tbody>
			@foreach($data as $band)
				<tr>
					<td scope="row" class="text-center text-secondary">{{$band->band}}</td>
					<td scope="row" class="text-center text-secondary">{{$band->price}} £</td>
					<td scope="row" class="text-center text-secondary">{{$band->duration}} months</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	
	</form>
</div>