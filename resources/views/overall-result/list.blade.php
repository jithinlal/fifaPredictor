@extends('layouts.admin.master')

@section('title')
    @parent
    Overall Results
@endsection

@section('pageHeading')
    Overall
@endsection

@section('pageSubHeading')
    Results
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/overall-result">
				Overall Results
		</a>
@endsection

@section('content')


    <div class="row">
        @foreach($overallPredictions as $overallPrediction)
            <form action="/admin/overall-result/add" method="POST">
                {{ csrf_field() }}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h4>{{$overallPrediction->name}}</h4>
                        </div>
                        <div class="form-group">
                            <select name="outcome" class="selectpicker form-control show-tick" data-live-search="true" title="Choose" data-style="bg-navy btn-flat"  data-size="10">
                                @switch($overallPrediction->forType)
                                    @case('team')

                                        @php $requiredTeams = ''; @endphp
                                        @switch($overallPrediction->name)
                                            @case('Group A Winner')
                                                @php $requiredTeams = $groups['A']; @endphp    
                                            @break
                                            @case('Group B Winner')
                                                @php $requiredTeams = $groups['B']; @endphp    
                                            @break 
                                            @case('Group C Winner')
                                                @php $requiredTeams = $groups['C']; @endphp    
                                            @break 
                                            @case('Group D Winner')
                                                @php $requiredTeams = $groups['D']; @endphp    
                                            @break 
                                            @case('Group E Winner')
                                                @php $requiredTeams = $groups['E']; @endphp    
                                            @break
                                            @case('Group F Winner')
                                                @php $requiredTeams = $groups['F']; @endphp    
                                            @break 
                                            @case('Group G Winner')
                                                @php $requiredTeams = $groups['G']; @endphp    
                                            @break 
                                            @case('Group H Winner')
                                                @php $requiredTeams = $groups['H']; @endphp    
                                            @break 
                                            @default
                                                @php $requiredTeams = $teams; @endphp    
                                        @endswitch    

                                        @foreach($requiredTeams as $team)
                                            @php
                                                $selected = '';
                                                if (isset($currentPredictions[$overallPrediction->id])) {
                                                    if ($currentPredictions[$overallPrediction->id] == $team->name) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                } 
                                            @endphp
                                            <option {{$selected}} id="{{$team->name}}" value="{{$team->name}}" data-tokens="{{$team->name}}">{{$team->name}}</option>
                                        @endforeach
                                        @break       
                                    @case('player')
                                        <option>Player 1</option>
                                        <option>Player 2</option>
                                        <option>Player 3</option>
                                        @break
                                    @case('goalkeeper')
                                        <option>GK 1</option>
                                        <option>GK 2</option>
                                        <option>GK 3</option>
                                        @break
                                @endswitch                               
                            </select>
                            <input type="hidden" name="match_id" value="0">
                            <input type="hidden" name="prediction_id" value="{{$overallPrediction->id}}">
                        </div>
                        <button id="submitButton-{{$overallPrediction->id}}" style="display:none;" type="submit" class="btn btn-primary">Sign in</button>
                        <a href="javascript:;" onclick="$('#submitButton-{{$overallPrediction->id}}').click();" class="small-box-footer">Submit <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </form>
        @endforeach
    </div>


        
@endsection