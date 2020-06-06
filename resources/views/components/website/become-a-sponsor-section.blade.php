<div class="d-flex flex-column justify-content-start align-items-center">
		
		{{--Sponsorship bands table--}}
		<table class="table table-responsive">
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
					<td scope="row" class="text-center text-secondary">{{$band->id}}</td>
					<td scope="row" class="text-center text-secondary">{{$band->price}} £</td>
					<td scope="row" class="text-center text-secondary">{{$band->duration}} months</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	
	</form>
</div>