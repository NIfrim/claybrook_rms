<table id="table" class="table table-responsive display nowrap table-striped table-bordered">
	<thead>
	<tr>
		@foreach($columns as $column)
			
			@if($column['name'] === 'permissions' && sizeof($rows) > 0)
				
				@foreach($rows->first()->permissions as $section => $permissions)
					<th scope="col">{{$section}}</th>
				@endforeach
				
			@elseif($column['name'] === 'permissions' && sizeof($rows) < 1)
				
				<th scope="col">Animals</th>
				<th scope="col">Reviews</th>
				<th scope="col">Accounts</th>
				<th scope="col">Sponsors</th>
				<th scope="col">Locations</th>
				<th scope="col">Events & News</th>
				
			@else
				
				<th scope="col">{{$column['title']}}</th>
				
			@endif
			
		@endforeach
		
		<th scope="col" class="actionsColumn">Actions</th>
	</tr>
	
	</thead>
	<tbody>
	@if(sizeof($rows) > 0)
		@foreach($rows as $accountType)
			<tr>
				@foreach($columns as $column)
					@if($column['name'] === 'permissions')
						{{--Concat first name and last name as full name--}}
						@foreach($accountType['permissions'] as $section => $permissions)
							<td>{{implode(', ', $permissions)}}</td>
						@endforeach
					
					@elseif($column['name'] === 'account_type')
						<td>{{$accountType->accountType->name}}</td>
					@else
						
						<td>{{$accountType[$column['name']]}}</td>
					
					@endif
				
				@endforeach
				
				<td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
					<a href = "{{route('admin.employees.manage', ['type' => $subcategory ?? $category, 'id' => $accountType->id])}}">
						<i class="icon-btn create material-icons p-2" title="Edit">create</i>
					</a>
					
					<form action = "{{route('admin.employees.delete', ['type' => $subcategory ?? $category])}}" method="post">
						@csrf
						<input type = "text" name="ids" value="{{$accountType->id}}" hidden />
						
						<button type="submit" class="icon-btn p-0">
							<i class="remove material-icons p-2 deleteRow" title="Delete">delete</i>
						</button>
					
					</form>
				</td>
			</tr>
		@endforeach
	@endif
	</tbody>
</table>