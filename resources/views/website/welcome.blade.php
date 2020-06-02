@extends('layouts.app')

@section('content')
    <x-website.carousel :category="$category" />
    
    <x-website.row-type-one type="events" :cardsData="$eventsData ?? []" />

    <x-website.row-type-one type="animalSpotlight" :cardsData="$animalsData ?? []" />
@endsection
