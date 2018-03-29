@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to FIFA predict!</div>

                <div class="card-body">
					<div class="list-group">
						@foreach ($matches as $match)
							@if($match->home_team != null)
								<a class="d-flex justify-content-center list-group-item list-group-item-action"><i class="flag-icon flag-icon-{{$teams[$match->home_team - 1]->iso2}}"></i> {{$teams[$match->home_team - 1]->name}} - {{$teams[$match->away_team - 1]->name}} <i class="flag-icon flag-icon-{{$teams[$match->away_team - 1]->iso2}}"></i></a>	
								@endif
						@endforeach
					</div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
