@extends('layouts.admin.master')

@section('title')
    @parent
    Match Days
@endsection

@section('pageHeading')
    {{DateTime::createFromFormat('Y-m-d', $day->day)->format('jS F , l')}} 
@endsection

@section('pageSubHeading')
    Matches
@endsection

@section('content')

@if($currentMatchesCount > 0)
	<div class="col-md-12">
      <div class="box box-info box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Currently selected Matches</h3>
        </div>
        <div class="box-body">
          <div class="row">
          		@foreach($currentMatches as $match)
			   		<div class="col-md-3">
			          <div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">
			              	@if($match->home_team)
				      			{{$teams[$match->home_team]}}
				      		@else
				      			&nbsp;
				      		@endif
				      		&nbsp;VS&nbsp;
				      		@if($match->home_team)
				      			{{$teams[$match->away_team]}}
				      		@else
				      			&nbsp;
				      		@endif
			              </h3>
			              <div class="box-tools pull-right">
			                <a title="remove" href="/match-days/remove/day/{{$day->id}}/match/{{$match->id}}/from/inside" type="button" class="btn btn-box-tool" style="color: red">
			                	<i class="fa fa-2x fa-times"></i>
			                </a>
			              </div>
			            </div>
			            <div class="box-body">
			              {{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('jS F , l' )}}
			              <br>
			              {{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('h:i A')}}
			            </div>
			          </div>
			        </div>
		        @endforeach
		   </div>
        </div>
        <div class="box-footer">
   
        </div>
      </div>
    </div>
@endif 

<form method="POST" action="/match-days/add/{{$day->id}}">
{{ csrf_field() }}
<div class="col-md-12">
      <div class="box box-info box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Matches</h3>
        </div>
        <div class="box-body">
          <div class="row">
          		<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">HomeTeam</th>
                      <th scope="col">AwayTeam</th>
                      <th scope="col">Type</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Add</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($freeMatches as $match)
					    <tr>
					      <td>
					      		@if($match->home_team)
					      		{{$teams[$match->home_team]}}
					      		@else
					      			&nbsp;
					      		@endif
					      </td>
					      <td>
					      		@if($match->home_team)
					      		{{$teams[$match->away_team]}}
					      		@else
					      			&nbsp;
					      		@endif
					      </td>
                          <td>{{$match->type}}</td>
                          <td>{{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('jS F , l' )}}</td>
                          <td>{{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('h:i A')}}</td>
                          <td>
                              <input name="day_matches[]" value="{{$match->id}}" type="checkbox">
                          </td>
					    </tr>
				    @endforeach
				  </tbody>
				</table>
		   </div>
        </div>
        <div class="box-footer">
			<div class="pull-left">
			    <button type="submit" class="btn btn-info">Submit</button>
		    </div>
		    <div class="pull-right">
			    <a href="/match-days" type="button" class="btn btn-primary">Cancel</a>
		    </div>
        </div>
      </div>
    </div>  
</form>      

@endsection        