@php
    use App\Meliorate;
    use App\BonusPoint;
@endphp

@extends('layouts.admin.master')

@section('title')
    @parent
    Test Controller
@endsection

@section('pageHeading')
    Test Controller
@endsection

@section('pageSubHeading')
    Index Action
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/test">
				Test Controller
		</a>
@endsection

@section('content')
        <p>
            Test Action of Test Controller
        </p>


     





@endsection