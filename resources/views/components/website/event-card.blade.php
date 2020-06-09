<div class="card flex-shrink-0 m-2 p-0 rounded-lg shadow-sm news-card">
    <div class="card-header">
        <h5 class="card-title mb-1">{{$title}}</h5>
        <p class="card-date mb-1">Between: <small class="text-muted">{{$startDate}} & {{$endDate}}</small> </p>
    </div>
    <a href = "{{route('website.experiences.events.show', ['id' => $id])}}" class="img-250">
        <img src = "{{$image ? '/images/events/'.$image : 'https://via.placeholder.com/250x150'}}" width="250px" alt = "Event image" class="img-fluid">
    </a>
    <div class="card-footer">
        <div class="card-text" data-lines="1">{{$shortDescription}}</div>
        <div class="card-actions d-flex justify-content-between">
            <span class="material-icons card-share">share</span>
            <span class="material-icons card-read-more">keyboard_arrow_down</span>
        </div>
    </div>
</div>