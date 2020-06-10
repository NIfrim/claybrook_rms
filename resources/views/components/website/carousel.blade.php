<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">

        @if($images)
        
            @foreach($images as $index=>$image)
            
                <div class="carousel-item {{$index === 0 ? 'active' : ''}}">
                    <img src = "{{'/images/'.$subcategory.'/'.$image}}" alt = "Carousel image" width="100%" class="img-fluid">
                </div>
            
            @endforeach
        
        @else
        
            <div class="carousel-item active">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: First slide">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#faffd6"/>
                    <text font-size="3rem" x="50%" y="50%" fill="#555" dy="0">First slide</text>
                </svg>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Second Slide">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#faffd6"/>
                    <text font-size="3rem" x="50%" y="50%" fill="#555" dy="0">Second slide</text>
                </svg>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Third slide">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#faffd6"/>
                    <text font-size="3rem" x="50%" y="50%" fill="#555" dy="0">Third slide</text>
                </svg>
            </div>
            
        @endif
        
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>