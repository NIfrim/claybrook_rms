<table id="agreementsTable" class="table table-responsive display nowrap table-striped">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col" class="text-nowrap">{{$column['title']}}</th>
        @endforeach
    </tr>
    
    </thead>
    <tbody>
    @if(sizeof($rows) > 0)
        @foreach($rows as $agreement)
            <tr>
                @foreach($columns as $column)
                    <td class="text-nowrap">{{$agreement[$column['name']]}}</td>
                @endforeach
            </tr>
        @endforeach
    @endif
    </tbody>
</table>