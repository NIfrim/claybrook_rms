@extends('layouts.app')

@section('content')
    
    <x-website.carousel :category="$subcategory ?? $category" />

    @if(sizeof($eventsCategories) > 0)
    
        {{-- Generate the rows --}}
        @foreach($eventsCategories as $eventCategory)
        
            {{-- Only if there are news inside the category --}}
            @if(sizeof($eventCategory->events) > 0)
                <x-website.row-type-one :type="$subcategory ?? $category" :title="$eventCategory->title" :cardsData="$eventCategory->events ?? null" />
            @endif
    
        @endforeach

    @endif

    
    @if(sizeof($newsCategories) > 0)
    
        {{-- Generate the rows --}}
        @foreach($newsCategories as $newsCategory)
            
            {{-- Only if there are news inside the category --}}
            @if(sizeof($newsCategory->news) > 0)
                <x-website.row-type-one :type="$subcategory ?? $category" :title="$newsCategory->title" :cardsData="$newsCategory->news ?? null" />
            @endif
            
        @endforeach
        
    @endif

    <x-website.row-type-one :type="$subcategory ?? $category" title="Animal Spotlight" :cardsData="$animals ?? null" />
@endsection
