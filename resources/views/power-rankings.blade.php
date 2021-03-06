@php
    use App\Meliorate;
@endphp

@extends('layouts.powerRankings')

@section('content')

    
<a href="/" title="Go Back" id="fixedbutton">
    <i class="fa fa-arrow-left fa-2x"></i>
</a>

<h1><span class="blue"></span>Team<span class="blue"></span> <span class="yellow">Power Rankings</pan></h1>
<h2>Bonus Point Formula : ( 100 * Matches Won ) + ( 30 * Matches drawn ) + ( 0 * Matches Lost ) + ( 10 * Goals Scored )</h2>
    

<table class="container">
	<thead>
		<tr>
			<th><h1>&NonBreakingSpace;</h1></th>
			<th><h1>&NonBreakingSpace;</h1></th>
            <th><h1>Goals Scored</h1></th>
            @if(! Meliorate::isSaUser(auth()->id()))
                <th><h1>Supporters</h1></th>
            @endif
			<th><h1>Wins</h1></th>
			<th><h1>Losses</h1></th>
			<th><h1>Draws</h1></th>
			<th><h1>Bonus Points</h1></th>
			<th><h1>Power Rank</h1></th>
		</tr>
	</thead>
	<tbody>

        @foreach($sortedTeams as $team)        

            @if ($loop->first)
            
                <tr style="background-color:#8b0000; color:white; font-size:20pt; line-height: 75px;">
                    <td style="color:white">
                        <span class="caption-content">			
                                <img class="img-fluid" src="/flags/png100px/{{ $team->iso2 }}.png">
                        </span>
                    </td>
                    <td style="color:white">{{ $team->name }}</td>                    
                    <td>{{ $team->goalsScored }}</td>
                    @if(! Meliorate::isSaUser(auth()->id()))
                        <td>{{ $team->supporterCount }}</td>
                    @endif    
                    <td>{{ $team->winCount }}</td>
                    <td>{{ $team->lossCount }}</td>
                    <td>{{ $team->drawCount }}</td>
                    <td>{{ $team->points }}</td>
                    <td class="rank"># {{ $loop->iteration }}</td>
                </tr>
                
            @elseif($userFavTeamId == $team->id)


                 <tr style="background-color:green; font-size:20pt; line-height: 44px;">
                    <td style="color:#90ee90">
                        <span class="caption-content">			
                                <img class="img-fluid" src="/flags/png100px/{{ $team->iso2 }}.png">
                        </span>
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->goalsScored }}</td>
                    @if(! Meliorate::isSaUser(auth()->id()))
                        <td>{{ $team->supporterCount }}</td>
                    @endif  
                    <td>{{ $team->winCount }}</td>
                    <td>{{ $team->lossCount }}</td>
                    <td>{{ $team->drawCount }}</td>
                    <td>{{ $team->points }}</td>
                    <td class="rank"># {{ $loop->iteration }}</td>
		        </tr>

            @else

                <tr>
                    <td style="color:white">
                        <span class="caption-content">			
                                <img class="img-fluid" src="/flags/png100px/{{ $team->iso2 }}.png">
                        </span>
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->goalsScored }}</td>
                    @if(! Meliorate::isSaUser(auth()->id()))
                        <td>{{ $team->supporterCount }}</td>
                    @endif  
                    <td>{{ $team->winCount }}</td>
                    <td>{{ $team->lossCount }}</td>
                    <td>{{ $team->drawCount }}</td>
                    <td>{{ $team->points }}</td>
                    <td># {{ $loop->iteration }}</td>
                </tr>
            
            @endif

        @endforeach

	</tbody>
</table>
  












@endsection()