@extends('layouts.rms')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <x-tables.locations-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        </div>
    </div>
@endsection
