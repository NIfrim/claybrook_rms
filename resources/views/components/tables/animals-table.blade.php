<table id="table" class="table display nowrap table-striped table-bordered">
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
                        <input type = "text" name="ids" value="{{$animal->id}}" hidden />

                        <button type="submit" class="icon-btn">
                            <i class="remove material-icons p-2 deleteRow" title="Delete">delete</i>
                        </button>
                        
                    </form>
                    
                    <i class="icon-btn healing material-icons p-2" title="Medical History">healing</i>
                    {{--<i class="icon-btn material-icons p-2" title="Website visible">visibility</i>--}}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="100">No Records</td>
        </tr>
    @endif
    </tbody>
</table>