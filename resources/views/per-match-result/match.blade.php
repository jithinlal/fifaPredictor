@php
    use App\Meliorate;
    $count = 1;
@endphp

@extends('layouts.admin.master')

@section('title')
    @parent
    Per Match Results
@endsection

@section('pageHeading')
    @if($match->home_team)
        {{$teams[$match->home_team]}}
    @else
        <i>TBA</i>
    @endif

     VS

    @if($match->away_team)
        {{$teams[$match->away_team]}}
    @else
        <i>TBA</i>
    @endif 
@endsection

@section('pageSubHeading')
   {{ Meliorate::adminSiteDate($match->date) }}
   {{ Meliorate::getTime($match->date) }}
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/per-match-result">
				Per Match Results
		</a>
@endsection

@section('breadcrumbLevelTwo')
       Match {{ $match->id }}
@endsection

@section('content')
        @foreach($predictions as $prediction)
            <div class="col-md-6">
                    <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title"><strong>#{{ $count }} </strong> &nbsp; {{ $prediction->name }}</h3>
                    </div>
                    <form method="POST" action="/admin/per-match-result/save" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="box-body">                            
                            @if('yesNo' == $prediction->forType)

                                
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Current Result</label>

                                        <div class="col-sm-4">
                                            @if(isset($existingPredictions[$prediction->id]))
                                                @if(1 == $existingPredictions[$prediction->id])
                                                    <text class="bg-green">Yes</text>
                                                @elseif(0 == $existingPredictions[$prediction->id])
                                                    <text class="bg-red">No</text>
                                                @endif
                                            @else
                                                Not Published
                                            @endif
                                        </div>
                                    </div>
                                

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="outcome" id="yesNoId1" value=1>
                                    <label class="form-check-label" for="yesNoId1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="outcome" id="yesNoId2" value=0>
                                    <label class="form-check-label" for="yesNoId2">
                                        No
                                    </label>
                                </div>
                            @elseif('score' == $prediction->forType)

                                
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Current Result</label>

                                        <div class="col-sm-4">
                                            @if(isset($existingPredictions[$prediction->id]))
                                                {{ $existingPredictions[$prediction->id] }}
                                            @else
                                                Not Published
                                            @endif
                                        </div>
                                    </div>

                                <select name="outcome">
                                    <option value="-1">Select</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                </select>
                            @elseif('result' == $prediction->forType)                               

                                <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Current Result</label>

                                        <div class="col-sm-4">
                                            @if(isset($existingPredictions[$prediction->id]))
                                                {{ $existingPredictions[$prediction->id] }}
                                            @else
                                                Not Published
                                            @endif
                                        </div>
                                </div>

                                <select name="outcome">
                                    <option value="-1">Choose a result</option>
                                    @foreach($resultOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <input type="hidden" name="predictionId" value="{{ $prediction->id }}">
                        <input type="hidden" name="matchId" value="{{ $match->id }}">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
            @php $count++; @endphp
        @endforeach



        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>#{{ $count }} </strong> &nbsp; Result Published</h3>
                </div>
                <form method="POST" action="/admin/per-match-result/mark-as-published" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="box-body">    
                        <label for="inputEmail3" class="col-sm-4 control-label">Current Result</label>  
                        <div class="col-sm-4">                      
                            @if($match->result_published)                            
                                <text class="bg-green">Published</text>
                            @else
                                <text class="bg-red">Not Published</text>
                            @endif   
                        </div>
                        <hr>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publishResult" id="publishResult1" value=1>
                            <label class="form-check-label" for="publishResult1">
                                Mark as Published
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publishResult" id="publishResult2" value=0>
                            <label class="form-check-label" for="publishResult2">
                                Mark as NOT Published
                            </label>
                        </div>                 
                    </div>
                    <input type="hidden" name="matchId" value="{{ $match->id }}">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
       
@endsection