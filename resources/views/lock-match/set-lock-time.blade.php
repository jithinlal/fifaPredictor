@php
    use App\Meliorate;
@endphp

@extends('layouts.admin.master')

@section('title')
    @parent
    Lock Matches
@endsection

@section('pageHeading')
    Lock
@endsection

@section('pageSubHeading')
    Matches
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/lock-match">
				Lock Matches
		</a>
@endsection
@section('breadcrumbLevelTwo')
				Set Lock Time
@endsection

@section('content')
<div class="row">
        
        <form action="/admin/lock-match/run-lock-time" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="lockTimeMinutes">Choose Lock Time Option</label>
                    <select class="selectpicker form-control show-tick" id="lockTimeMinutes" name="lockTimeMinutes" required="required">
                        <option value=0>Select</option>
                        @foreach($avaialableLockTimeOptions as $timeInMinutes => $displayName)
                            @php
                                $selected = '';
                                if($gap == $timeInMinutes) {
                                    $selected = 'selected="selected"';
                                }
                            @endphp
                            <option {{ $selected }} value={{ $timeInMinutes }}>{{ $displayName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

</div>

<hr style="border-top: 1px solid #ccc; background: transparent;">

<div class="row">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TEAM 1</th>
                <th scope="col">TEAM 2</th>
                <th scope="col">MATCH DATE</th>
                <th scope="col">LOCK DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>
                        @if($match->home_team)
                                {{ $teams[$match->home_team] }}
                        @else
                            tbd
                        @endif
                    </td>
                    <td>
                        @if($match->away_team)
                            {{ $teams[$match->away_team] }}
                        @else
                            tbd
                        @endif
                    </td>
                    <td>{{ Meliorate::adminSiteDate($match->date) }} <strong> {{ Meliorate::getTime($match->date) }} </strong></td>
                    <td>{{ Meliorate::adminSiteDate($match->lock_time) }} <strong> {{ Meliorate::getTime($match->lock_time) }} </strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
        
@endsection