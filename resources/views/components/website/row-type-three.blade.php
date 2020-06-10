<div class="did-you-know-row">
    <div class="row-top">
        <div class="container d-flex justify-content-start">
            {{--Title--}}
            <h4 class="row-title my-3 p-3 filled rotated">{{$title}}</h4>
        </div>
    </div>
    
    <div class="row-bottom py-5">
        <div class="container d-flex justify-content-between">
            
            @if(isset($category) && $category === 'about-us')
            
                {{--Column with Info 1--}}
                <div class="d-flex flex-column align-items-center">
                    <h1 class="p-2 text-secondary">20 000</h1>
                    <h3 class="p-2 text-secondary">Amazing animals</h3>
                </div>
        
                {{--Column with Info 2--}}
                <div class="d-flex flex-column align-items-center">
                    <h1 class="p-2 text-secondary">1.4 Million</h1>
                    <h3 class="p-2 text-secondary">Visitors each year</h3>
                </div>
        
                {{--Column with Info 3--}}
                <div class="d-flex flex-column align-items-center">
                    <h1 class="p-2 text-secondary">120</h1>
                    <h3 class="p-2 text-secondary">Dedicated staff</h3>
                </div>
            
            @else
        
                <h4>{{$message ?? 'Some description and educational info...'}}</h4>
                
            @endif
            
           
        </div>
    </div>

</div>