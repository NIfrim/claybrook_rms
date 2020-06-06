<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm top-bar">
	<div class="container">
		
		{{-- Left side --}}
		<div class="d-flex flex-nowrap justify-content-between align-items-center">
			{{-- Title --}}
			<h3 class="top-bar-title">{{ucfirst($category) . ($subcategory ? ' - ' . ucfirst($subcategory) : '') . ($subcategory2 ? ' - ' . ucfirst($subcategory2) : '')}}</h3>
			
			{{-- Action buttons --}}
			@if($category !== 'dashboard')
				<div class="d-flex flex-nowrap justify-content-equal align-items-center mx-2">
					@if($formType)
						@if($category === 'eventsAndNews')
							<a href = "{{route('admin.'.$category.'.'.'manage', ['type' => $subcategory ?? $category, 'id' => 'newCategory'])}}">
								<button id="createCategory" type="button" class="btn btn-primary mx-2">Create Category</button>
							</a>
						@endif
					@else
						@if($category !== 'reviews')
							@if($subcategory !== 'accounts' && $subcategory !== 'agreements' && $subcategory !== 'signage')
								<a href = "{{route('admin.'.$category.'.'.'manage', ['type' => $subcategory ?? $category, 'id' => isset($subcategory2) ? 'newCategory' : 'new'])}}">
									<button type="button" class="btn btn-primary mx-2">Add New</button>
								</a>
							@endif
						@endif
					
						<button id="clearSelection" type="button" class="btn btn-primary mx-2">Clear Selection</button>
					
						<form action = "{{route('admin.'.$category.'.delete', ['type' => $subcategory2 ? $subcategory.'Category' : $subcategory ?? $category])}}" method="post">
							@csrf
							<input type = "text" name="ids" id="removeInput" required hidden>
							
							<button id="removeSelected" type="submit" class="btn btn-primary mx-2">Remove Selected</button>
						</form>
					@endif
				</div>
			@endif
		</div>
		
		<!-- Right side -->
		<ul class="navbar-nav ml-auto">
			<!-- Dropdown -->
			@guest
				<h1>Not authorized to be here!</h1>
			@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle top-bar-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<span class="top-bar-dropdown-text">{{ Auth::user()->first_name }}</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('user.logout') }}"
							 onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						
						<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			@endguest
		</ul>
	
	</div>
</nav>