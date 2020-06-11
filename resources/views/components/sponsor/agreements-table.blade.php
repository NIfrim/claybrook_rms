<table id="agreementsTable" class="table table-responsive display nowrap table-striped">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col" class="text-nowrap">{{$column['title']}}</th>
        @endforeach
        
        <th scope="col" class="actionsColumn">Actions</th>
    </tr>
    
    </thead>
    <tbody>
    @if(sizeof($rows) > 0)
        @foreach($rows as $agreement)
            <tr>
                @foreach($columns as $column)
                    <td class="text-nowrap">{{$agreement[$column['name']]}}</td>
                @endforeach
                
                <td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
                    <a href = "#" data-toggle="link">
                        <i class="icon-btn create material-icons p-2 text-teal" title="Edit">create</i>
                    </a>
    
                    <a href = "#" data-toggle="link">
                        <i class="icon-btn create material-icons p-2 text-orange" title="Delete">delete</i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>