@extends('layouts.rms')

@section('content')
		
		<div class="container mb-3" id="pillsWrapper">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" href="#animalDetailsForm">Animal Details</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#medicalHistoryWrapper">Medical History</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#watchlistHistoryWrapper">Watchlist History</a>
				</li>
			</ul>
		</div>
		
		<div class="tab-content" id="pillsContentWrapper">
			<div class="container forms-container tab-pane active" role="tabpanel" id="animalDetailsForm">
				<x-forms.animal-form
						:data="$data"
						:formType="$formType"
						:category="$category"
						:subcategory="$subcategory"
						title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}"/>
				
			</div>
			
			<div class="container tab-pane" role="tabpanel" id="medicalHistoryWrapper">
				
				<x-tables.animal-medical-history-table
						selectable=true
						:model="App\Models\AnimalMedicalHistory::class"
						:category="$category"
						:subcategory="$subcategory"
						:relations="['animal']"/>
				
				<div class="modal fade" id="medicalHistoryModal" role="dialog" aria-hidden="true">
								
					<x-forms.animal-medical-history-form
							:data="$data"
							formType="new"
							:category="$category"
							:subcategory="$subcategory"
							title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}"/>
					
				</div>
				
			</div>
			
			<div class="container tab-pane" role="tabpanel" id="watchlistHistoryWrapper">
				
				<x-tables.animal-watchlist-history-table
						selectable=true
						:model="App\Models\AnimalWatchlistHistory::class"
						:category="$category"
						:subcategory="$subcategory"
						:relations="['animal']"/>
				
				<div class="modal fade" id="watchlistHistoryModal" role="dialog" aria-hidden="true">
					
					<x-forms.animal-watchlist-history-form
							:data="$data"
							formType="new"
							:category="$category"
							:subcategory="$subcategory"
							title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}"/>
				
				</div>
				
			</div>
			
		</div>

@endsection