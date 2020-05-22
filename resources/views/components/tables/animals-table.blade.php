<div class="container">
    <div class="d-flex flex-nowrap justify-content-start">
    </div>
    <table id="table" class="table display responsive nowrap table-striped table-bordered">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th scope="col">{{$column['title']}}</th>
            @endforeach

            <th scope="col">Actions</th>
        </tr>
        
        </thead>
        <tbody>
        @if(sizeof($rows) > 0)
            @foreach($rows as $bird)
                <tr>
                    @foreach($columns as $column)
                      <td>{{$bird[$column['name']]}}</td>
                    @endforeach

                    <td class="d-flex justify-content-between flex-nowrap" id="table-actions-wrapper">
                        <i class="icon-btn create material-icons p-2">create</i>
                        <i class="icon-btn remove material-icons p-2">delete</i>
                        <i class="icon-btn healing material-icons p-2">healing</i>
                        <i class="icon-btn material-icons p-2">visibility</i>
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
</div>