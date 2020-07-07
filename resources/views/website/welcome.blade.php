@extends('layouts.app')

@section('content')
    
    <x-website.carousel :category="$category ?? null" subcategory="home" />

    @if(sizeof($eventsCategories) > 0)
    
        {{-- Generate the rows --}}
        @foreach($eventsCategories as $eventCategory)
        
            {{-- Only if there are news inside the category --}}
            @if(sizeof($eventCategory->events) > 0)
                <x-website.row-type-one :type="$subcategory ?? $category" :title="$eventCategory->title" :cardsData="$eventCategory->events ?? null" />

            @else
                <x-website.row-type-one :type="$subcategory ?? $category" title="Events" :cardsData="null" />
            @endif
    
        @endforeach

    @else
        <x-website.row-type-one :type="$subcategory ?? $category" title="Events" :cardsData="null" />

    @endif

    
    @if(sizeof($newsCategories) > 0)
    
        {{-- Generate the rows --}}
        @foreach($newsCategories as $newsCategory)
            
            {{-- Only if there are news inside the category --}}
            @if(sizeof($newsCategory->news) > 0)
                <x-website.row-type-one :type="$subcategory ?? $category" :title="$newsCategory->title" :cardsData="$newsCategory->news ?? null" />

            @else
                <x-website.row-type-one :type="$subcategory ?? $category" title="News" :cardsData="null" />
            @endif
            
        @endforeach

    @else
        <x-website.row-type-one :type="$subcategory ?? $category" title="News" :cardsData="null" />
        
    @endif

    <x-website.row-type-one :type="$subcategory ?? $category" title="Animal Spotlight" :cardsData="$animals ?? null" />
@endsection
