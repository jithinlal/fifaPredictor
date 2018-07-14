<!-- Main Prediction -->
<section class="content-section bg-primary text-white text-center" id="services">
	<div class="container">
		<div class="content-section-heading">
			<h3 class="text-secondary mb-5">The Golden 16</h3>
			<h2 class="mb-5">MAIN PREDICTION</h2>
			<h4 style="color:yellow" class="mb-5"> Lock Time {{ \App\Meliorate::getOverallLockTime() }}</h4>
		</div>
		<div class="row">

		@php
			$isOverAllLocked = \App\Meliorate::isOverallPredictionLocked();
		@endphp

			@foreach($predictions as $prediction)
				@if($loop->iteration == 5 || $loop->iteration == 9 || $loop->iteration == 13)
					</div>
					<div class="row">
				@endif
				<div class="col-lg-3 col-md-6 mb-5 mb-lg-0" id="prediction-{{$prediction->type}}-{{$prediction->id}}">
					<span class="service-icon rounded-circle mx-auto mb-3">
						<img src="/prediction_logo/{{$prediction->image}}.png">
					</span>
					<h4>
						<strong>{{$prediction->name}}</strong>
					</h4>
					@if(!$isOverAllLocked)
						@if(!in_array($prediction->id,$userPredicionIds))
							<button data-text="Predict {{$prediction->name}}" data-id="{{$prediction->id}}" class="btn btn-info jqPredict">Predict</button>
						@else
							<p class="text-uppercase font-weight-bold text-warning">{{$userPredictions[$prediction->id]}}</p>
						@endif
					@else
						@if(in_array($prediction->id,$userPredicionIds))
							<p class="text-uppercase font-weight-bold text-warning">{{$userPredictions[$prediction->id]}}</p>
						@else
							<p class="text-uppercase font-weight-bold text-warning">Not Predicted</p>
						@endif
						<p class="text-uppercase font-weight-bold text-success">{{/App/Meliorate::overallPredictionUserPoints(auth()->id(), $prediction->id)}}</p>
					@endif

					<p class="text-uppercase font-weight-bold text-warning"></p>
				</div>
			@endforeach
		</div>
	</div>
</section>


<div class="modal" tabindex="-1" role="dialog" id="modal_predict">
<div class="loader-wrapper" id="loader-2">
  <div id="loader"></div>
</div>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title jqModalTitle"></h5>
        <button type="button" class="close jqClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control jqSelect">
		</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info jqSave">Predict</button>
        <button type="button" class="btn btn-warning jqClose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="player_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title jqModalTitle"></h5>
        <button type="button" class="close jqClosePlayer" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control jqSelectCountry">
		</select>
		<hr/>
		<select class="form-control jqSelectPlayer">
		</select>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-info jqSaveCountry">Select Country</button> --}}
		<button type="button" class="btn btn-info jqSavePlayer">Predict</button>
        <button type="button" class="btn btn-warning jqCloseClose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var token = '{{Session::token()}}';
	var teamUrl = '{{route('getPredict')}}';
	var groupAUrl = '{{route('getGroupTeams')}}';
	var playerUrl = '{{route('getPlayerName')}}';
	var getPredicted = '{{route('getPredictedData')}}';
	var predictionSubmit = '{{route('submitPrediction')}}';
</script>