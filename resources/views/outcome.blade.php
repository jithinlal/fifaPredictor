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


						<h2 id="homeScorePredicth2"><span>{{$user_home_point}}</span></h2>
						<a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_home_prediction}}" data-originaloutcome="{{$home_outcome}}" data-userredpoint="{{$user_home_point}}" data-title="Goal Scored By {{$teams[$match->home_team]->name}}">
                          Info
                        </a>

                    </figcaption>

                </figure>

                </li>



                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/yellow-card.jpg')}}" alt="" class="img-responsive"/>

                    <figcaption>

						<h2 id="yellowCardPredicth2"><span>{{$user_yellow_point}}</span></h2>
						<a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_yellow_prediction}}" data-originaloutcome="{{$yellow_outcome}}" data-userredpoint="{{$user_yellow_point}}" data-title="Will There be more than 5 YELLOW CARDS?">
                          Info
                        </a>
                    </figcaption>

                </figure>

                </li>

				 <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/hat-trick.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>


						<h2 id="hatTrickPredicth2"><span>{{$user_hat_point}}</span></h2>
						<a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_hat_prediction}}" data-originaloutcome="{{$hat_outcome}}" data-userredpoint="{{$user_hat_point}}" data-title="Will There be any HAT TRICK?">
                          Info
                        </a>

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


						<h2 id="awayScorePredicth2"><span>{{$user_away_point}}</span></h2>
						<a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_away_prediction}}" data-originaloutcome="{{$away_outcome}}" data-userredpoint="{{$user_away_point}}" data-title="Goal Scored By {{$teams[$match->away_team]->name}}">
                          Info
                        </a>

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/own-goal.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>


						<h2 id="ownGoalPredicth2"><span>{{$user_own_point}}</span></h2>
						<a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_own_prediction}}" data-originaloutcome="{{$own_outcome}}" data-userredpoint="{{$user_own_point}}" data-title="Will There be any OWN GOAL?">
                          Info
                        </a>

                    </figcaption>

                </figure>

                </li>

                <li>

                	<figure class="effect-oscar">

                    <img src="{{asset('/predictions/red-card.jpg')}}" alt="" class="img-responsive"/>

                     <figcaption>

                        <h2><span>{{$user_red_point}}</span></h2>
                        <a type="button" class="btn btn-primary predictOutcome" data-myprediction="{{$user_red_prediction}}" data-originaloutcome="{{$red_outcome}}" data-userredpoint="{{$user_red_point}}" data-title="Will There be any RED CARD?">
                          Info
                        </a>

                    </figcaption>

                </figure>

                </li>



            </ul>

        </section>

        <div class="clearfix"></div>

    </div>

<div class="modal fade" id="InfoModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Your Prediction</th>
                    <th scope="col">Actual Outcome</th>
                    <th scope="col">Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="yourPre"></td>
                    <td id="oriOutcome"></td>
                    <td id="totalPoint"></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">X</button>
      </div>
    </div>
  </div>
</div>

@endsection