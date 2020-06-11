<table id="table" class="table table-responsive display nowrap table-striped table-bordered">
	<thead>
	<tr>
		@foreach($columns as $column)
			<th scope="col">{{$column['title']}}</th>
		@endforeach
		
		<th scope="col" class="actionsColumn">Actions</th>
	</tr>
	
	</thead>
	<tbody>
	@if(sizeof($rows) > 0)
		@foreach($rows as $animal)
			<tr>
				@foreach($columns as $column)
					<td>{{$animal[$column['name']]}}</td>
				@endforeach
				
				<td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
					<a href = "{{route('admin.'.$category.'.'.'manage', ['type' => $subcategory ?? $category, 'id' => $animal->id])}}">
						<i class="icon-btn create material-icons p-2" title="Edit">create</i>
					</a>
					
					<form action = "{{route('admin.animals.delete', ['type' => $subcategory ?? $category])}}" method="post">
						@csrf
						<input type = "text" name="ids" value="{{$animal->id}}" hidden readonly />
						
						<button type="submit" class="icon-btn p-0">
							<i class="remove material-icons p-2" title="Delete">delete</i>
						</button>
					
					</form>
					
					{{-- Toggle animal spotlight --}}
					<form action = "{{route('admin.animals.toggle', ['type' => $subcategory ?? $category])}}" method="post">
						@csrf
						<input type = "text" name="id" value="{{$animal->id}}" hidden readonly="" />
						
						<input type = "text" maxlength="1" name="toggler" value="{{$animal ? ($animal->in_spotlight === 'N' ? 'Y' : 'N') : 'N'}}" hidden readonly>
						
						<button type="submit" name="toggle-spotlight" class="icon-btn p-0" >
							<i class="toggle material-icons p-2" title="Visible in spotlight">camera</i>
						</button>
					
					</form>
					
					
					{{-- Toggle on website --}}
					<form action = "{{route('admin.animals.toggle', ['type' => $subcategory ?? $category])}}" method="post">
						@csrf
						<input type = "text" name="id" value="{{$animal->id}}" hidden readonly />
						
						<input type = "text" maxlength="1" name="toggler" value="{{$animal ? ($animal->on_website === 'N' ? 'Y' : 'N') : 'N'}}" hidden readonly>
						
						<button type="submit" name="toggle-website" class="icon-btn p-0">
							<i class="toggle material-icons p-2" title="Visible on website">{{$animal->on_website === 'Y' ? 'visibility' : 'visibility_off'}}</i>
						</button>
					
					</form>
				</td>
			</tr>
		@endforeach
	@endif
	</tbody>
</table>