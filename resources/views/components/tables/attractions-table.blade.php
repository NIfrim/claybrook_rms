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
        @foreach($rows as $attraction)
            <tr>
                @foreach($columns as $column)
                    
                    <td>{{$attraction[$column['name']]}}</td>
                    
                @endforeach
                
                <td class="d-flex justify-content-between flex-nowrap actionsColumn" id="table-actions-wrapper">
  
                  <a href = "{{route('admin.'.$category.'.'.'manage', ['id' => $attraction->id])}}">
                    <i class="icon-btn create material-icons p-2" title="Edit">create</i>
                  </a>
                  
                  <form action = "{{route('admin.attractions.delete', ['type' => $subcategory ?? $category])}}" method="post">
                      @csrf
                      <input type = "text" name="ids" value="{{$attraction->id}}" hidden />
                      
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