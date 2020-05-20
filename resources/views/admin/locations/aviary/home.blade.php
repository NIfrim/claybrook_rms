@extends('layouts.rms')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <x-tables.default-table selectable=true showId=true :columns="$columns" :rows="$aviariesWithRelated"/>
        </div>
    </div>
@endsection
