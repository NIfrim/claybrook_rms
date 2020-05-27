{{--SIDE NAV--}}
<nav class="d-flex flex-column justify-content-between navbar-nav side-nav">
    <div class="d-flex flex-column justify-content-around">
        {{--LOGO--}}
        <div class="logo navbar-brand d-flex justify-content-center align-items-center ">
            <a href = {{route('admin.home')}}>
                <img src="/images/Logo-large.jpg" alt="Claybrook Zoo Logo" width="90px">
            </a>
        </div>

        {{--MENU ITEMS--}}
        <ul class="d-flex flex-column justify-content-between align-items-stretch list-unstyled menu-items-wrapper">
            {{--Animals--}}
            <li class="menu-item">
                <a href="#animalsSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'animals' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Animals</span>
                    <i class="material-icons menu-item-icon">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled {{$category === 'animals' ? 'show' : ''}}" id="animalsSubmenu">
                    <li class="menu-sub-item {{$subcategory === 'birds' ? 'active' : ''}}">
                        <a href="{{route('admin.animals.list', ['type' => 'birds'])}}"><span class="menu-sub-item-text">Birds</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'fishes' ? 'active' : ''}}">
                        <a href="{{route('admin.animals.list', ['type' => 'fishes'])}}"><span class="menu-sub-item-text">Fishes</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'mammals' ? 'active' : ''}}">
                        <a href="{{route('admin.animals.list', ['type' => 'mammals'])}}"><span class="menu-sub-item-text">Mammals</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'reptiles' ? 'active' : ''}}">
                        <a href="{{route('admin.animals.list', ['type' => 'reptiles'])}}"><span class="menu-sub-item-text">Reptiles</span></a>
                    </li>
                </ul>
            </li>

            {{--Accounts--}}
            <li class="menu-item">
                <a href="#accountsSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'accounts' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Accounts</span>
                    <i class="material-icons menu-item-icon">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled {{$category === 'accounts' ? 'show' : ''}}" id="accountsSubmenu">
                    <li class="menu-sub-item {{$subcategory === 'sponsors' ? 'active' : ''}}">
                        <a href="{{route('admin.accounts.sponsors')}}"><span class="menu-sub-item-text">Sponsors</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'users' ? 'active' : ''}}">
                        <a href="{{route('admin.accounts.users')}}"><span class="menu-sub-item-text">Users</span></a>
                    </li>
                </ul>
            </li>

            {{--Events and News--}}
            <li class="menu-item {{$category === 'eventsAndNews' ? 'active' : ''}}">
                <a href="{{route('admin.eventsAndNews')}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Events & News</span>
                </a>
            </li>

            {{--Locations--}}
            <li class="menu-item">
                <a href="#locationsSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'locations' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Locations</span>
                    <i class="material-icons menu-item-icon">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled {{$category === 'locations' ? 'show' : ''}}" id="locationsSubmenu">
                    <li class="menu-sub-item {{$subcategory === 'aquarium' ? 'active' : ''}}">
                        <a href="{{route('admin.locations.list', ['type' => 'aquarium'])}}"><span class="menu-sub-item-text">Aquarium</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'aviary' ? 'active' : ''}}">
                        <a href="{{route('admin.locations.list', ['type' => 'aviary'])}}"><span class="menu-sub-item-text">Aviary</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'compounds' ? 'active' : ''}}">
                        <a href="{{route('admin.locations.list', ['type' => 'compound'])}}"><span class="menu-sub-item-text">Compounds</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'hothouse' ? 'active' : ''}}">
                        <a href="{{route('admin.locations.list', ['type' => 'hothouse'])}}"><span class="menu-sub-item-text">Hothouse</span></a>
                    </li>
                </ul>
            </li>

            {{--Reviews--}}
            <li class="menu-item {{$category === 'reviews' ? 'active' : ''}}">
                <a href="{{route('admin.reviews')}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Reviews</span>
                </a>
            </li>

            {{--Sponsors--}}
            <li class="menu-item">
                <a href="#sponsorsSubmenu" data-toggle="collapse" aria-expanded="{{$category === 'sponsors' ? 'true' : 'false'}}" class="d-flex flex-nowrap justify-content-between">
                    <span class="menu-item-text">Sponsors</span>
                    <i class="material-icons menu-item-icon">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled {{$category === 'sponsors' ? 'show' : ''}}" id="sponsorsSubmenu">
                    <li class="menu-sub-item {{$subcategory === 'agreements' ? 'active' : ''}}">
                        <a href="{{route('admin.sponsors.agreements')}}"><span class="menu-sub-item-text">Agreements</span></a>
                    </li>
                    <li class="menu-sub-item {{$subcategory === 'signage' ? 'active' : ''}}">
                        <a href="{{route('admin.sponsors.signage')}}"><span class="menu-sub-item-text">Signage</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    {{--Bottom settings buttons--}}
    <ul class="d-flex flex-column justify-content-between align-items-baseline list-unstyled extra-items">
        {{--Zoo Details--}}
        <li class="extra-item">
            <a href="#" data-toggle="collapse" aria-expanded="false" class="d-flex flex-nowrap">
                <i class="material-icons extra-item-icon">settings</i>
                <span class="extra-item-text">Zoo Settings</span>
            </a>
        </li>

        {{--Support--}}
        <li class="extra-item">
            <a href="#" data-toggle="collapse" aria-expanded="false" class="d-flex flex-nowrap">
                <i class="material-icons extra-item-icon">help</i>
                <span class="extra-item-text">Support</span>
            </a>
        </li>
    </ul>
</nav>