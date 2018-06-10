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
                                        @foreach($players as $player)   
                                            @php
                                                $selected = '';
                                                if (isset($currentPredictions[$overallPrediction->id])) {
                                                    if ($currentPredictions[$overallPrediction->id] == $player->name) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                } 
                                            @endphp            
                                            <option {{ $selected }} value="{{ $player->name }}" data-tokens="{{ $player->name }}">{{ $player->name }}</option>
                                        @endforeach
                                        @break
                                    @case('goalkeeper')
                                         @foreach($goalkeepers as $goalkeeper)   
                                            @php
                                                $selected = '';
                                                if (isset($currentPredictions[$overallPrediction->id])) {
                                                    if ($currentPredictions[$overallPrediction->id] == $goalkeeper->name) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                } 
                                            @endphp            
                                            <option {{ $selected }} value="{{ $goalkeeper->name }}" data-tokens="{{ $goalkeeper->name }}">{{ $goalkeeper->name }}</option>
                                        @endforeach
                                        @break
                                    @case('young_player')
                                        @foreach($youngPlayers as $youngPlayer)   
                                            @php
                                                $selected = '';
                                                if (isset($currentPredictions[$overallPrediction->id])) {
                                                    if ($currentPredictions[$overallPrediction->id] == $youngPlayer->name) {
                                                        $selected = 'selected="selected"';
                                                    }
                                                } 
                                            @endphp            
                                            <option {{ $selected }} value="{{ $youngPlayer->name }}" data-tokens="{{ $youngPlayer->name }}">{{ $youngPlayer->name }}</option>
                                        @endforeach
                                    @break
                                @endswitch                               
                            </select>
                            <br>
                            <div class="col-10">
                                <input name="comment" class="form-control bg-black" type="text" value="{{ $currentComments[$overallPrediction->id] ?? '' }}" id="comment" placeholder="Add Comment Here">
                            </div>
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

    
    <div class="col-md-6">
        <div class="box bg-olive">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>

                <h3 class="box-title">Semifinalists</h3>
            </div>
            <div class="box-body">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Please use this carefully. This is a Get Request. Not a Form submission.
                    Try to use this only once
                    Do this Only after Admin has finished entering 1,2,3,4 places.(Precaution has been taken anyway)
            
                    This will check if the user has predicted any of the semifinalists correctly, irrespective of the order.
                    
                    Only users who have predicted all 4 of 1,2,3,4 places will get points via this method

                </div>    
                <a class="btn btn-primary" href="/admin/overall-result/semi-finalists-points">Submit and populate semifinalists points</a>          
            </div>
        </div>
    </div>


        
@endsection