<div class="container">
    
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            @if($selectable)
                <th rowspan="2" scope="col"><i class="material-icons">check_box_outline_blank</i></th>
            @endif
            
            <th scope="col">id</th>
            <th scope="col">location</th>
            <th scope="col">classification</th>
            <th scope="col">specie</th>
            <th scope="col">name</th>
            <th scope="col">date of birth</th>
            <th scope="col">sponsorship band</th>
            <th scope="col">Actions</th>
        
        </tr>
        <tr>
            <th scope="col"></th>
            <th scope="col">location</th>
            <th scope="col">classification</th>
            <th scope="col">specie</th>
            <th scope="col">name</th>
            <th scope="col">date of birth</th>
            <th scope="col">sponsorship band</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @if(sizeof($rows) > 0)
            @foreach($rows as $bird)
                <tr>
                    @if($selectable)
                        <td colspan="1"><i class="material-icons">check_box</i></td>
                    @endif
                    <td>{{$bird->animal->id}}</td>
                    <td>{{$bird->animal->location_id}}</td>
                    <td>{{$bird->animal->classification}}</td>
                    <td>{{$bird->animal->species}}</td>
                    <td>{{$bird->animal->name}}</td>
                    <td>{{$bird->animal->dob}}</td>
                    <td>{{$bird->animal->sponsorship_band_id}}</td>
                    <td>Actions</td>
                
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="0">No Records</td>
            </tr>
        @endif
        </tbody>
    </table>
    
    {{$rows->links()}}

</div>