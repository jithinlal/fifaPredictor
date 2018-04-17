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
            <form action="/overall-result/match/0/prediction/{{$overallPrediction->id}}"
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </form>
        @endforeach
    </div>


        
@endsection