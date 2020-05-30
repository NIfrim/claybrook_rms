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
        @foreach($rows as $review)
            <tr>
                @foreach($columns as $column)
                    @if($column['name'] === 'reaction')
                        {{--Add reaction value 0 - Dislike, 1 - Like--}}
                        @if($review['reaction'] === 1)
                          <td>Liked</td>
                        @elseif($review['reaction'] === 0)
                          <td>Disliked</td>
                        @endif
                    @else
                        
                        <td>{{$review[$column['name']]}}</td>
                    
                    @endif
                
                @endforeach
                
                <td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
                    <form action = "{{route('admin.reviews.delete', ['type' => $subcategory ?? $category])}}" method="post">
                        @csrf
                        <input type = "text" name="ids" value="{{$review->id}}" hidden />
                        
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