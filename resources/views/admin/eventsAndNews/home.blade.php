@extends('layouts.rms')

@section('content')
    <div class="container">
        <div class="container">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a href="{{route('admin.eventsAndNews.list', ['type' => $subcategory])}}" class="nav-link {{isset($subcategory2) ? '' : 'active'}}">{{ucfirst($subcategory)}} list</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.eventsAndNews.list.categories', ['type' => $subcategory])}}" class="nav-link {{isset($subcategory2) ? 'active' : ''}}">{{ucfirst($subcategory)}} categories</a>
            </li>
          </ul>
          
          <div class="tab-content p-4 border-left border-right border-bottom">
            
            <div class="tab-pane {{isset($subcategory2) ? '' : 'active'}}" id="subcategory" role="tabpanel">
              @if($subcategory === 'events')
                <x-tables.events-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @elseif($subcategory === 'news')
                <x-tables.news-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @endif
              
            </div>
            
            <div class="tab-pane {{isset($subcategory2) ? 'active' : ''}}" id="categories" role="tabpanel">
              @if($subcategory === 'events')
                <x-tables.events-categories-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @elseif($subcategory === 'news')
                <x-tables.news-categories-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @endif
            </div>
          </div>
        </div>
    </div>
@endsection
