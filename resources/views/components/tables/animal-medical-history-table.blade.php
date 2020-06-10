<table id="medicalHistoryTable" class="table table-responsive nowrap table-striped table-bordered">
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
        @foreach($rows as $medicalHistory)
            <tr>
                @foreach($columns as $column)
                    <td>{{$medicalHistory[$column['name']]}}</td>
                @endforeach
                
                <td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
                    {{--Edit medical history action--}}
                    <div id="editMedicalHistory">
                        <span class="icon-btn create material-icons p-2" title="Edit">create</span>
                    </div>
                    
                    {{--Delete current medical history action--}}
                    <form action = "{{route('admin.animals.delete', ['type' => $subcategory ?? $category, 'subtype' => 'medicalHistory'])}}" method="post">
                        @csrf
                        <input type = "text" name="ids" value="{{$medicalHistory->id}}" hidden readonly />
                        <input type = "text" name="animal_id" value="{{$medicalHistory->animal_id}}" hidden readonly />
                        
                        <button type="submit" class="icon-btn p-0">
                            <i class="remove material-icons p-2" title="Delete">delete</i>
                        </button>
                    
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>