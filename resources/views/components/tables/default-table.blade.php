<div class="table-responsive">
	<table class="table table-hover table-bordered">
		<thead>
		<tr class="d-flex align-items-stretch flex-nowrap">
			@if($selectable)
				<th scope="col" class="table-cell d-flex align-items-center"><i class="material-icons">check_box_outline_blank</i></th>
			@endif
			
			@foreach($columns as $column)
				<th scope="col" class="table-cell d-flex align-items-center"><span>{{str_replace('_', ' ', str_replace('_id', '', $column))}}</span></th>
			@endforeach
			
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		@if(sizeof($rows) > 0)
			@foreach($rows as $row)
				<tr>
					<td><i class="material-icons">check_box</i></td>
					@foreach($columns as $column)
						<td>{{$row->$column}}</td>
					@endforeach
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="0">No Records</td>
			</tr>
		@endif
		</tbody>
	</table>
</div>