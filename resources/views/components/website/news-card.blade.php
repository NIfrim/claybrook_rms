<div class="card flex-shrink-0 m-2 p-0 rounded-lg shadow-sm news-card">
    <div class="card-header">
        <h5 class="card-title mb-1">{{$title}}</h5>
        <p class="card-date mb-1">Posted on: <small class="text-muted">{{$datePosted}}</small> </p>
    </div>
    <a href = "{{route('website.experiences.news.show', ['id' => $id])}}">
        <img src = "{{$image ?? 'https://via.placeholder.com/250x150'}}" alt = "News image">
    </a>
    <div class="card-footer">
        <div class="card-text" data-lines="1">{{$shortDescription}}</div>
        <div class="card-actions d-flex justify-content-between">
            <span class="material-icons card-share">share</span>
            <span class="material-icons card-read-more">keyboard_arrow_down</span>
        </div>
    </div>
</div>