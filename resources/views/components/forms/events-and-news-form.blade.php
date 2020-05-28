<form action = "{{route('admin.eventsAndNews.submit', ['type' => $subcategory, 'formType' => $formType])}}" method="post">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the zoo and own id--}}
            <input type = "number" id="id" name="id" value="{{$data['currentRow']['id'] ?? $data['id']}}" required hidden readonly />
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']['zoo_id'] ?? $data['zooId']}}" required hidden readonly />
            
            <div class="container-responsive">
                {{--Title--}}
                <div class="form-group row">
                    <label for="title" class="col-xl-2 col-form-label">{{ __('Title') }}</label>
        
                    <div class="col-xl-10">
                        <input type = "text"
                               id="title"
                               name="title"
                               value="{{old('title') ?? $data['currentRow']['title'] ?? ''}}"
                               class="form-control @error('startDate') is-invalid @enderror"
                               required
                               autofocus>
            
                        @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Category--}}
                <div class="form-group row">
                    <label for="categoryId" class="col-xl-2 col-form-label">{{ __('Category') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="categoryId"
                                type="text"
                                class="form-control @error('categoryId') is-invalid @enderror"
                                name="category_id"
                                required
                                autofocus>
                            
                            <option value = "" {{old('category_id') !== '' | isset($data['currentRow']) && isset($data['currentRow']['category_id'])  ? '' : 'selected'}}>Select</option>
                            
                            @foreach($data['categories'] as $category)
                                <option value = "{{$category->id}}" {{old('category_id') !== '' | isset($data['currentRow']) && isset($data['currentRow']['category_id']) && $data['currentRow']['category_id'] === $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                            
                        </select>
                        
                        @error('categoryId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Start Date--}}
                <div class="form-group row">
                    <label for="startDate" class="col-xl-2 col-form-label">{{ __('Start date') }}</label>
                    
                    <div class="col-xl-10">
                        <input type = "date"
                               id="startDate"
                               name="start_date"
                               value="{{old('start_date') ?? $data['currentRow']['start_date'] ?? ''}}"
                               class="form-control @error('startDate') is-invalid @enderror"
                               required
                               autofocus>
            
                        @error('startDate')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--End Date--}}
                <div class="form-group row">
                    <label for="endDate" class="col-xl-2 col-form-label">{{ __('End date') }}</label>
        
                    <div class="col-xl-10">
                        <input type = "date"
                               id="endDate"
                               name="end_date"
                               value="{{old('end_date') ?? $data['currentRow']['end_date'] ?? ''}}"
                               class="form-control @error('endDate') is-invalid @enderror"
                               required
                               autofocus>
            
                        @error('endDate')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Repeat--}}
                <div class="form-group row">
                    <label for="repeat" class="col-xl-2 col-form-label">{{ __('Event repeats') }}</label>
        
                    <div class="col-xl-10">
                        <select id="repeat"
                                type="text"
                                class="form-control @error('repeat') is-invalid @enderror"
                                name="repeat"
                                required
                                autofocus>
                
                            <option value = "" {{old('repeat') !== '' | isset($data['currentRow']) && isset($data['currentRow']['repeat'])  ? '' : 'selected'}}>Select</option>
                            <option value = "NEVER" {{old('repeat') === 'NEVER' | isset($data['currentRow']) && isset($data['currentRow']['repeat']) && $data['currentRow']['repeat'] === 'NEVER' ? 'selected' : ''}}>Never</option>
                            <option value = "DAILY" {{old('repeat') === 'DAILY' | isset($data['currentRow']) && isset($data['currentRow']['repeat']) && $data['currentRow']['repeat'] === 'DAILY' ? 'selected' : ''}}>Daily</option>
                            <option value = "WEEKLY" {{old('repeat') === 'WEEKLY' | isset($data['currentRow']) && isset($data['currentRow']['repeat']) && $data['currentRow']['repeat'] === 'WEEKLY' ? 'selected' : ''}}>Weekly</option>
                            <option value = "MONTHLY" {{old('repeat') === 'MONTHLY' | isset($data['currentRow']) && isset($data['currentRow']['repeat']) && $data['currentRow']['repeat'] === 'MONTHLY' ? 'selected' : ''}}>Monthly</option>
                            <option value = "YEARLY" {{old('repeat') === 'YEARLY' | isset($data['currentRow']) && isset($data['currentRow']['repeat']) && $data['currentRow']['repeat'] === 'YEARLY' ? 'selected' : ''}}>Yearly</option>
                        </select>
            
                        @error('repeat')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Short description--}}
                <div class="form-group row">
                    <label for="shortDescription" class="col-xl-2 col-form-label">{{ __('Short description') }}</label>
                    
                    <div class="col-xl-10">
                        <textarea name = "short_description"
                                  id = "shortDescription"
                                  class="form-control @error('shortDescription') is-invalid @enderror"
                                  required autofocus>{{old('short_description') ?? $data['currentRow']['short_description'] ?? ''}}</textarea>
                        
                        @error('shortDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Long description--}}
                <div class="form-group row">
                    <label for="longDescription" class="col-xl-2 col-form-label">{{ __('Long description') }}</label>
        
                    <div class="col-xl-10">
                        <textarea name = "long_description"
                                  id = "longDescription"
                                  class="form-control @error('longDescription') is-invalid @enderror"
                                  required autofocus>{{old('long_description') ?? $data['currentRow']['long_description'] ?? ''}}</textarea>
            
                        @error('longDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Main image--}}
                <div class="form-group row">
                    <label for="image" class="col-xl-2 col-form-label">{{ __('Banner image') }}</label>
        
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('image') is-invalid @enderror"
                                   id="customFile"
                                   name="image"
                                   autofocus>
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>
            
                        @error('image')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.eventsAndNews.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submitType" value="{{$subcategory}}" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>