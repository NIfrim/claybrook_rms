<div class="card flex-shrink-0 m-2 p-0 rounded-lg shadow-sm animal-card">
    <div class="card-header">
        <h5 class="card-title">{{$title}}</h5>
        <p class="card-sponsor">Sponsored by: <small class="text-muted">{{$sponsor}}</small> </p>
    </div>
    <a href = "{{route('website.animals.showOne', ['type' => $type, 'id' => $id])}}">
        <img src = "{{$image ?? 'https://via.placeholder.com/250x250'}}" alt = "Animal Image">
    </a>
</div>