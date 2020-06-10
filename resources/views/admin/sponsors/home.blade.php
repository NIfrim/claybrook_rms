@extends('layouts.rms')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      
      @if($subcategory === 'sponsorshipBands')
    
        <x-tables.sponsorship-bands-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
  
      @elseif($subcategory === 'accounts')

        <x-tables.sponsors-accounts-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        
      @elseif($subcategory === 'agreements')
    
        <x-tables.sponsors-agreements-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        
      @elseif($subcategory === 'signage')
    
        <x-tables.agreements-signage-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        
      @endif
      
    </div>
  </div>
@endsection
