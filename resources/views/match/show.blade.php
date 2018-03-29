@extends('layouts.app')

@section('content')
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-md-8">							
				<div class="col-md-3 text-center">
				<div class="d-flex justify-content-start">
					<span class="flag-icon flag-icon-{{$teams[$match->home_team - 1]->iso2}}" style="transform: scale(2.5,2.5)"></span>					
						<h3>{{$teams[$match->home_team - 1]->name}}</h3>					
						</div>
				<div class="d-flex justify-content-start">
				
				
					<span class="flag-icon flag-icon-{{$teams[$match->away_team - 1]->iso2}}" style="transform: scale(2.5,2.5)"></span>					
						<h3>{{$teams[$match->away_team - 1]->name}}</h3>					
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection()