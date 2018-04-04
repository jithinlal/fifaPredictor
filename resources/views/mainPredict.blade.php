<!-- Main Prediction -->
<section class="content-section bg-primary text-white text-center" id="services">
	<div class="container">
		<div class="content-section-heading">
			<h3 class="text-secondary mb-0">The Golden 16</h3>
			<h2 class="mb-5">MAIN PREDICTION</h2>
		</div>
		<div class="row">
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
					@if(!in_array($prediction->id,$userPredictions))
						<button data-text="Predict {{$prediction->name}}" data-id="{{$prediction->id}}" class="btn btn-info jqPredict">Predict</button>
					@else
						<p class="text-uppercase font-weight-bold text-warning">{{}}</p>
					@endif
					<p class="text-uppercase font-weight-bold text-warning"></p>
				</div>
			@endforeach
		</div>
	</div>
</section>



<div class="modal" tabindex="-1" role="dialog" id="modal_predict">
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


<script type="text/javascript">
	var token = '{{Session::token()}}';
	var teamUrl = '{{route('getPredict')}}';
	var groupAUrl = '{{route('getGroupTeams')}}';
	var playerUrl = '{{route('getPlayerName')}}';
	var predictionSubmit = '{{route('submitPrediction')}}';
</script>