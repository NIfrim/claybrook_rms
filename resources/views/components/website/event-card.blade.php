<div class="card event-card">
    <div class="card-body">
        <div class="card-title">{{$title}}</div>
        <div class="card-date">{{$startDate}} - {{$endDate}}</div>
        <img src = "{{$image}}" alt = "Event card image">
    </div>
    <div class="card-body">
        <div class="card-text">{{$shortDescription}}</div>
        <div class="card-actions">
            <span class="material-icons">share</span>
            <span class="material-icons">keyboard_arrow_down</span>
        </div>
    </div>
</div>