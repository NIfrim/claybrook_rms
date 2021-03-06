<div class="card flex-shrink-0 m-2 p-0 rounded-lg shadow-sm attraction-card">
    <div class="card-header">
        <h5 class="card-title mb-1">{{$name}}</h5>
        <p class="card-date mb-1">Type: <small class="text-muted">{{$type}}</small> </p>
    </div>
    <a href = "{{route('website.ourZoo.attractions.show', ['id' => $id])}}" class="img-250">
        <img src = "{{$image ? '/images/attractions/'.$image : 'https://via.placeholder.com/250x250'}}" alt = "Attraction image" class="img-fluid">
    </a>
    <div class="card-footer">
        <div class="card-text" data-lines="1">{{$shortDescription}}</div>
        <div class="card-actions d-flex justify-content-between">
            <span class="material-icons card-share">share</span>
            <span class="material-icons card-read-more">keyboard_arrow_down</span>
        </div>
    </div>
</div>