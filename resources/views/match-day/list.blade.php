@extends('layouts.admin.master')

@section('title')
    @parent
    Match Days
@endsection

@section('pageHeading')
    Match Days
@endsection

@section('pageSubHeading')
    List
@endsection

@section('content')

        @if(!empty($days) && count($days))

            <div class="row">
                @foreach($days as $key => $day)
                    <div class="col-md-6">
                      <div class="box box-solid" style="border: solid 2px grey; width: 553px; height: 287px;">
                        <div class="box-header with-border">
                          <h3 class="box-title">
                              <strong>
                                Match Day {{$key}}
                              </strong>
                               &nbsp;
                                <i class="fa fa-calendar"></i>
                               {{DateTime::createFromFormat('Y-m-d', $day)->format('jS F , l')}}
                          </h3>
                        </div>
                        <div class="box-body">
                            @if ($currentDayMatchCount[$key] != 0)
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">HomeTeam</th>
                                      <th scope="col">AwayTeam</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Time</th>
                                      <th scope="col">Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                @foreach($currentDayMatches[$key] as $matchId)
                                        @php $match = $matches[$matchId]; @endphp
                                        <tr>
                                          <td>
                                            @if($match->home_team)
                                                {{$teams[$match->home_team]}}
                                            @else
                                                tbd
                                            @endif
                                          </td>
                                          <td>
                                            @if($match->home_team)
                                                {{$teams[$match->away_team]}}
                                            @else
                                                tbd
                                            @endif
                                          </td>
                                          <td>{{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('jS F , l' )}}</td>
                                          <td>{{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->format('h:i A')}}</td>
                                          <td>
                                              <a href="/match-days/remove/day/{{$key}}/match/{{$match->id}}/from/main">
                                                <i class="fa fa-remove bg-red"></i>
                                            </a>
                                          </td>
                                        </tr>

                                @endforeach
                                        <tr>
                                            <td><a href="/match-days/add/{{$key}}">Add More Matches</a></td>
                                        </tr>
                                  </tbody>
                                  </table>

                            @else
                                <div class="center-block text-center" style="padding-top: 80px">
                                    <a class="btn btn-app   bg-olive btn-flat" href="/match-days/add/{{$key}}">
                                        <i class="fa fa-plus"></i> Add Match
                                    </a>
                                </div>
                            @endif

                        </div>
                      </div>
                    </div>
                @endforeach

            </div>

        @else

            <p>No Match days added</p>
            <p><a href="/days">Click here to Add them </a></p>

        @endif
@endsection