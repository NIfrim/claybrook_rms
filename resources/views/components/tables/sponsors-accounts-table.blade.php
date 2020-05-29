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
        @foreach($rows as $sponsor)
            <tr>
                @foreach($columns as $column)
                    @if($column['name'] === 'full_name')
                        {{--Concat first name and last name as full name--}}
                        <td>{{$sponsor['first_name'].' '.$sponsor['last_name']}}</td>
                        
                    @elseif($column['name'] === 'address')
                        {{--Format the address [building number/name] [road] [town] [postcode]--}}
                        <td>{{$sponsor['building'] . ' ' . $sponsor['road'] . ' ' . $sponsor['town'] . ' ' . $sponsor['postcode']}}</td>
                        
                    @else
                        
                        <td>{{$sponsor[$column['name']]}}</td>
                        
                    @endif
                    
                @endforeach
                
                <td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
                    <a href = "{{route('admin.sponsors.manage', ['type' => $subcategory ?? $category, 'id' => $sponsor->id])}}">
                        <i class="icon-btn create material-icons p-2" title="Edit">create</i>
                    </a>
                    
                    <form action = "{{route('admin.sponsors.delete', ['type' => $subcategory ?? $category])}}" method="post">
                        @csrf
                        <input type = "text" name="ids" value="{{$sponsor->id}}" hidden />
                        
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