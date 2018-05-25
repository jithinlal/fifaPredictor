@extends('layouts.matchapp')

@section('content')

	<div class="row">

    	<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
        	<article role="pge-title-content">

            	<header>
					<a type="button" class="btn btn-outline-warning" href="{{url()->previous()}}"><span style="font-size:50px;">&#8592;</span></a>
                	<h2><span>{{$match->type}}</span></h2> <h2>{{$teams[$match->home_team]->name}}</h2>
                    <h1>v/s</h1>
                    <h2>{{$teams[$match->away_team]->name}}</h2>

                </header>

            </article>

        </section>



        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

        	<figure class="effect-oscar">

            	<img src="/stadiums/{{$stadia[$match->stadium_id]->name}}.jpg" alt="" class="img-responsive"/>

                <figcaption>

                	<h2>{{$stadia[$match->stadium_id]->name}}<span> {{$stadia[$match->stadium_id]->city}}</span></h2>

					<p>{{\Carbon\Carbon::parse($match->date)->toDayDateTimeString()}}</p>

					<a href="">View more</a>

                </figcaption>

            </figure>

        </section>



        <div class="clearfix"></div>



        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

        	<ul class="grid-lod effect-2" id="grid">

            	<li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/flags/png1000px/'.$teams[$match->home_team]->iso2.'.png')}}" alt="" class="img-responsive"/>


                    <figcaption>



                            <h2><span>{{$teams[$match->home_team]->name}}</span> {{$teams[$match->away_team]->name}}</h2>

                            <p>How much will <b>{{$teams[$match->home_team]->name}}</b> score?</p>

                            <a class="home_score" data-team={{$teams[$match->home_team]->name}} data-id={{$teams[$match->home_team]->id}} data-matchid={{$match->id}} data-matchid={{$match->id}} href="">View more</a>



                    </figcaption>

                </figure>

                </li>



                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/yellow-card.jpg')}}" alt="" class="img-responsive"/>

                    <figcaption>

                        <h2>Card <span>YELLOW</span></h2>

                        <p>Will number of <b>Yellow Card</b> goes past <b>5</b> ?</p>

                        <a class="yellow_card" href="" data-matchid={{$match->id}}>View more</a>

                    </figcaption>

                </figure>

                </li>

				 <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/hat-trick.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>

                        <h2>Trick <span>HAT</span></h2>

                        <p>Will there be any <b>Hat-Trick</b> ?</p>

                        <a class="hat_trick" href="" data-matchid={{$match->id}}>View more</a>

                    </figcaption>

                </figure>

                </li>

            </ul>

        </section>

		<div class="clear-fix"></div>

        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

        	<ul class="grid-lod effect-2" id="grid">

        		<li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/flags/png1000px/'.$teams[$match->away_team]->iso2.'.png')}}" alt="" class="img-responsive"/>

                     <figcaption>

                        <h2>{{$teams[$match->home_team]->name}} <span>{{$teams[$match->away_team]->name}}</span></h2>

                        <p>How much will <b>{{$teams[$match->away_team]->name}}</b> score?</p>

                        <a class="away_score" data-team={{$teams[$match->away_team]->name}} data-id={{$teams[$match->away_team]->id}} data-matchid={{$match->id}} href="">View more</a>

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/own-goal.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>

                        <h2>Goal <span>OWN</span></h2>

                        <p>Do you predict an <b>Own Goal</b> ?</p>

                        <a class="own_goal" data-matchid={{$match->id}} href="">View more</a>

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/red-card.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>

                        <h2>Card <span>RED</span></h2>

                        <p>Any <b>Red Cards</b> ?</p>

                        <a class="red_card" href="" data-matchid={{$match->id}}>View more</a>

                    </figcaption>

                </figure>

                </li>



            </ul>

        </section>

        <div class="clearfix"></div>

    </div>


    <script type="text/javascript">
		var token = '{{Session::token()}}';
		var storeAwayGoal = '{{route('getAwayTeamGoal')}}';
		var storeHomeGoal = '{{route('getHomeTeamGoal')}}';
		var storeYellowCard = '{{route('getYellowCard')}}';
		var storeRedCard = '{{route('getRedCard')}}';
		var storeHatTrick = '{{route('getHatTrick')}}';
		var storeOwnGoal = '{{route('getOwnGoal')}}';
	</script>

@endsection