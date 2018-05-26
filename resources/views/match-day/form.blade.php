@php
    use App\Meliorate;
@endphp

@extends('layouts.admin.master')

@section('title')
    @parent
    Match Days
@endsection

@section('pageHeading')
  Match Day {{$day->id}}    
@endsection

@section('pageSubHeading')
  {{Meliorate::adminSiteDate($day->day)}}
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/match-days">
				Match Days
		</a>
@endsection

@section('breadcrumbLevelTwo')
        <a href="/admin/match-days/add/{{$day->id}}">
				{{$day->id}}
		</a>
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
                                tbd
                            @endif
                            &nbsp;VS&nbsp;
                            @if($match->home_team)
                                {{$teams[$match->away_team]}}
                            @else
                                tbd
                            @endif
                          </h3>
                          <div class="box-tools pull-right">
                            <a title="remove" href="/admin/match-days/remove/day/{{$day->id}}/match/{{$match->id}}/from/inside" type="button" class="btn btn-box-tool" style="color: red">
                                <i class="fa fa-2x fa-times"></i>
                            </a>
                          </div>
                        </div>
                        <div class="box-body">
                          {{Meliorate::adminSiteDate($match->date)}}
                          <br>
                          {{Meliorate::getTime($match->date)}}
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

<form method="POST" action="/admin/match-days/add/{{$day->id}}">
{{ csrf_field() }}
<div class="col-md-12">
      <div class="box box-info box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Matches</h3>
          <p>
             <div class="pull-right">
                  <button type="submit" class="btn bg-green">Submit</button>
              </div>
              <div class="pull-left">
                  <a href="/admin/match-days" type="button" class="btn btn-primary">Cancel</a>
              </div>
            </p>
        </div>
        <div class="box-body">
                <table class="table table-sm">
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
                                    <i>TBA</i>
                                @endif
                          </td>
                          <td>
                                @if($match->home_team)
                                {{$teams[$match->away_team]}}
                                @else
                                  <i>TBA</i>
                                @endif
                          </td>
                          <td>{{$match->type}}</td>
                          <td>{{Meliorate::adminSiteDate($match->date)}}</td>
                          <td>{{Meliorate::getTime($match->date)}}</td>
                          <td>
                              <input name="day_matches[]" value="{{$match->id}}" type="checkbox">
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>        
      </div>
    </div>  
</form>      

@endsection
