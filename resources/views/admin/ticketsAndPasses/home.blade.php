@extends('layouts.rms')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      
      @if($subcategory === 'tickets')
    
        <x-tables.tickets-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        
      @elseif($subcategory === 'passes')
    
        <x-tables.passes-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
        
      @endif
      
    </div>
  </div>
@endsection
