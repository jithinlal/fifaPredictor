@extends('layouts.admin.master')

@section('title')
    @parent
    Admin Home
@endsection

@section('pageHeading')
    Admin
@endsection

@section('pageSubHeading')
    Home
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3>{{ $totalUserCount }}</h3>

                    <p>Total Users</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3>{{ $saUserCount }}</h3>

                    <p>SA Users</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/admin/user-sa-user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3>{{ $totalPredictionCount }}</h3>

                    <p>Total Predictions</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3>{{ $overallPredictions }}</h3>

                    <p>Overall Predictions</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                    <h3>{{ $perMatchPredictions }}</h3>

                    <p>Match Predictions</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-navy">
                    <div class="inner">
                    <h3>{{ round($predictionPerMatch, 3) }}</h3>

                    <p>Predictions Per User</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
      </div>
    </div>  
    
    <div class="container bg-purple">
        <div class="row">                
            <div class="col-md-4">
                <p class="text-center">
                    <strong>Top 3 Supported Clubs</strong>
                </p>
                @foreach($mostFans as $country)

                <div class="progress-group">
                    <span class="progress-text">{{ $allTeams[$country->fav_team_id] }}</span>
                    <span class="progress-number"><b>{{ $country->userCount }}</b>/{{ $totalUserCount }}</span>

                    <div class="progress sm">
                    <div class="progress-bar progress-bar-aqua" style="width: {{ ($country->userCount/$totalUserCount)*100 }}%"></div>
                    </div>
                </div>  

                @endforeach                   
            </div>
        </div>
    </div>


@endsection