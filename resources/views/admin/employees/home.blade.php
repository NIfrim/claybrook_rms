@extends('layouts.rms')

@section('content')
    <div class="container">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="{{route('admin.employees.list', ['type' => 'accounts'])}}" class="nav-link {{$subcategory === 'accounts' ? 'active' : ''}}">Employees list</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.employees.list', ['type' => 'accountTypes'])}}" class="nav-link {{$subcategory === 'accountTypes' ? 'active' : ''}}">Account types</a>
                </li>
            </ul>
        
            <div class="tab-content p-4 border-left border-right border-bottom">
            
                {{--Employees accounts section--}}
                <div class="tab-pane {{$subcategory === 'accounts' ? 'active' : ''}}" id="subcategory" role="tabpanel">
                    
                    @if($subcategory === 'accounts')
                        
                        <x-tables.employees-accounts-table
                            selectable=true
                            :model="$model"
                            :relations="$relations"
                            :category="$category"
                            :subcategory="$subcategory" />
                        
                    @endif
            
                </div>
    
                {{--Account types section--}}
                <div class="tab-pane {{$subcategory === 'accountTypes' ? 'active' : ''}}" id="subcategory" role="tabpanel">
        
                    @if($subcategory === 'accountTypes')
            
                        <x-tables.account-types-table
                            selectable=true
                            :model="$model"
                            :relations="$relations"
                            :category="$category"
                            :subcategory="$subcategory" />
        
                    @endif
    
                </div>
            </div>
        </div>
    </div>
@endsection
