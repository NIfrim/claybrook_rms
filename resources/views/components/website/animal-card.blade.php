<div class="card flex-shrink-0 m-2 p-0 col-lg-3 col-md-4 col-sm-6 rounded-lg shadow-sm animal-card">
    <div class="card-header">
        <h5 class="card-title mb-1">{{$title}}</h5>
        <p class="card-sponsor mb-1">Sponsored by: <small class="text-muted">{{$sponsor}}</small> </p>
    </div>
    <a href = "{{route('website.ourZoo.animals.show', ['type' => $type, 'id' => $id])}}" class="img-250">
        <img src = "{{$image ? '/images/animals/'.$image : 'https://via.placeholder.com/250x250'}}" alt = "Animal Image" class="img-fluid">
    </a>
</div>