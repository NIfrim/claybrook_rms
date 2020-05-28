@extends('layouts.rms')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="menuitem">
              <a href="{{route('admin.eventsAndNews.list', ['type' => $subcategory])}}" class="nav-link {{$subcategory === 'events' | $subcategory === 'news' ? 'active' : ''}}">{{ucfirst($subcategory)}} list</a>
            </li>
            <li class="nav-item" role="menuitem">
              <a href="{{route('admin.eventsAndNews.list', ['type' => $subcategory.'Categories'])}}" class="nav-link {{$subcategory === 'categories' ? 'active' : ''}}">{{ucfirst($subcategory)}} categories</a>
            </li>
          </ul>
          
          <div class="tab-content">
            <div class="tab-pane {{$subcategory === 'events' | $subcategory === 'news' ? 'active' : ''}}" role="tabpanel">
              @if($subcategory === 'events')
                <x-tables.events-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @elseif($subcategory === 'news')
                <x-tables.news-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
              @endif
            </div>
            
            <div class="tab-pane" role="tabpanel">
              Categories list
            </div>
          </div>
          
          
        </div>
    </div>
@endsection
