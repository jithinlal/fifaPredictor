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


      @if(BonusPoint::isFavTeamPlaying(Auth::id(), $matchId))       
        <p>
            Total Bonus Points Obtained From this Match : {{ BonusPoint::userMatchBonusPoints(Auth::id(), $matchId) }}
        </p>
        <p>
            Result : {{ BonusPoint::userMatchFavTeamResult(Auth::id(), $matchId) }} for {{ BonusPoint::getFavTeamName(Auth::id()) }}
        </p>
        <p>
            Points for  {{ BonusPoint::userMatchFavTeamResult(Auth::id(), $matchId) }} :  {{ BonusPoint::userMatchFavTeamResultPoints(Auth::id(), $matchId) }}
        </p>
        <p>
            Goals Scored by {{ BonusPoint::getFavTeamName(Auth::id()) }} : {{ BonusPoint::userMatchFavTeamGoals(Auth::id(), $matchId) }} 
        </p>
        <p>
            Points for  Goals Scored :  {{ BonusPoint::userMatchFavTeamGoalsPoints(Auth::id(), $matchId) }}
        </p>
      @else
        {{ BonusPoint::getFavTeamName(Auth::id()) }} is not playing this match.
         So no bonus points for this match :(
      @endif  





@endsection