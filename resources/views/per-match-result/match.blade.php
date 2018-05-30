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
   {{Meliorate::adminSiteDate($match->date)}}
   {{Meliorate::getTime($match->date)}}
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/per-match-result">
				Per Match Results
		</a>
@endsection

@section('breadcrumbLevelTwo')
       Match {{$match->id}}
@endsection

@section('content')
        @foreach($predictions as $prediction)
            <div class="col-md-6">
                    <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">
                            @if(isset($existingPredictions[$prediction->id]))
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Current Result</label>

                                    <div class="col-sm-10">
                                        {{ $existingPredictions[$prediction->id] }}
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="inputPassword3" placeholder="Password" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
            @php $count++; @endphp
        @endforeach
       
@endsection