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

					<p>{{ \App\Meliorate::perMatchDate($match->date) }}</p>

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


								<h2 id="homeScorePredicth2"><span>{{$user_home_prediction}}</span> {{$home_outcome}}</h2>


                            <p>How much will <b>{{$teams[$match->home_team]->name}}</b> score?</p>

							@if(!\App\Meliorate::isMatchLocked($match->id))
                            	<a class="home_score" data-team={{$teams[$match->home_team]->name}} data-id={{$teams[$match->home_team]->id}} data-matchid={{$match->id}} data-matchid={{$match->id}} href="">View more</a>
							@else
								<a class="match_lock_alert"></a>
							@endif

                    </figcaption>

                </figure>

                </li>



                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/yellow-card.jpg')}}" alt="" class="img-responsive"/>

                    <figcaption>

                        	<h2 id="yellowCardPredicth2"><span>{{$yellow_outcome}}</span> {{$user_yellow_prediction}}</h2>


                        <p>Will number of <b>Yellow Card</b> goes past <b>5</b> ?</p>

						@if(!\App\Meliorate::isMatchLocked($match->id))
                        	<a class="yellow_card" href="" data-matchid={{$match->id}}>View more</a>
						@else
							<a class="match_lock_alert"></a>
						@endif

                    </figcaption>

                </figure>

                </li>

				 <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/hat-trick.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>


                        	<h2 id="hatTrickPredicth2"><span>{{$hat_outcome}}</span> {{$user_hat_prediction}}</h2>


                        <p>Will there be any <b>Hat-Trick</b> ?</p>

						@if(!\App\Meliorate::isMatchLocked($match->id))
							<a class="hat_trick" href="" data-matchid={{$match->id}}>View more</a>
						@else
							<a class="match_lock_alert"></a>
						@endif

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


                        	<h2 id="awayScorePredicth2"><span>{{$away_outcome}}</span> {{$user_away_prediction}}</h2>


                        <p>How much will <b>{{$teams[$match->away_team]->name}}</b> score?</p>

						@if(!\App\Meliorate::isMatchLocked($match->id))
							<a class="away_score" data-team={{$teams[$match->away_team]->name}} data-id={{$teams[$match->away_team]->id}} data-matchid={{$match->id}} href="">View more</a>
						@else
							<a class="match_lock_alert"></a>
						@endif

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/own-goal.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>


                        	<h2 id="ownGoalPredicth2"><span>{{$own_outcome}}</span> {{$user_own_prediction}}</h2>


                        <p>Do you predict an <b>Own Goal</b> ?</p>

						@if(!\App\Meliorate::isMatchLocked($match->id))
							<a class="own_goal" data-matchid={{$match->id}} href="">View more</a>
						@else
							<a class="match_lock_alert"></a>
						@endif

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/red-card.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>


                        	<h2 id="redCardPredicth2"><span>{{$red_outcome}}</span> {{$user_red_prediction}}</h2>

                        <p>Any <b>Red Cards</b> ?</p>

						@if(!\App\Meliorate::isMatchLocked($match->id))
                        	<a class="red_card" href="" data-matchid={{$match->id}}>View more</a>
						@else
							<a class="match_lock_alert"></a>
						@endif

                    </figcaption>

                </figure>

                </li>



            </ul>

        </section>

        <div class="clearfix"></div>

    </div>

@endsection