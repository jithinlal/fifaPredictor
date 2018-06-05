@php
    use App\Meliorate;
@endphp

@extends('layouts.admin.master')

@section('title')
    @parent
    Prediction Points
@endsection

@section('pageHeading')
    Prediction 
@endsection

@section('pageSubHeading')
    Points
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/prediction-points">
				Prediction Points
		</a>
@endsection

@section('content')
    <div class="row">
      @foreach($allPredictions as $prediction)
            <form method="POST" action="/admin/prediction-points/update" class="form-horizontal">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $prediction->name }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Plus <i class="fa fa-plus" style="color:green;"></i>
                                    </span>
                                <input name="plus" type="number" class="form-control" value="{{ $prediction->plus }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Minus  <i class="fa fa-minus" style="color:red;"></i>
                                    </span>
                                    <input name="minus" type="number" class="form-control" value="{{ $prediction->minus }}">
                                </div>
                            </div>                          
                            <input type="hidden" name="predictionId" value="{{ $prediction->id }}">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>  
                            <hr>
                            <hr>
                        </div>
                    </div>  
                </div>
            </form>      
      @endforeach
    </div>
@endsection