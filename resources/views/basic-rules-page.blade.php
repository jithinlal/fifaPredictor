@extends('layouts.basic-rules')
@php
    use App\Meliorate;
@endphp
@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Rules and Point System</h1>
  <p class="lead"><a href= "/">wcpredict.club</a> is a simple prediction website designed for the Fifa World Cup, 2018 , Russia</p>
  <p class="lead">Every prediction can earn you points</p>

  </div>
</div>

<div class="container">
    <div class="row">
        <p>
            There a two types of predictions.
        </p>
    </div>
    <div class="row">
        <p>
            1) Main Predictions
        </p>
    </div>
    <div class="row">
        <p>
            These are predictions that are independent of any particular match. These predictions have to be submitted before <b> {{ Meliorate::getOverallLockTime() }} </b>
        </p>
    </div>
</div>

<hr>

<div class="container">

<div class="card-deck row">
  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#1</b> World Cup Winner</h5>
      <p class="card-text">The largest single prediction</p>
      <p class="card-text">You choose among the 32 countries and predict a winner</p>
     </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>1000</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>200</b> points</li>
    </ul>
  </div>

  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#2</b> World Cup Runners Up</h5>
      <p class="card-text">Predict the team that is going to come second</p>
    </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>750</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>150</b> points</li>
    </ul>
  </div>

  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#3</b> Third Place</h5>
      <p class="card-text">Predict the wiiner of the Loser's final</p>
      </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>500</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>100</b> points</li>
    </ul>
  </div>

</div>

<hr>

<div class="card-deck row">
  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#1</b> World Cup Winner</h5>
      <p class="card-text">The largest single prediction</p>
      <p class="card-text">You choose among the 32 countries and predict a winner</p>
     </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>1000</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>200</b> points</li>
    </ul>
  </div>

  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#2</b> World Cup Runners Up</h5>
      <p class="card-text">Predict the team that is going to come second</p>
    </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>750</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>150</b> points</li>
    </ul>
  </div>

  <div class="card">
    <img class="card-img-top" src="/home_img/trophy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>#3</b>Third Place</h5>
      <p class="card-text">Predict the wiiner of the Loser's final</p>
      </div>  
     <ul class="list-group list-group-flush">
        <li class="list-group-item">On Getting this right, You earn <b>500</b> points</li>
        <li class="list-group-item">On Getting this wrong, You lose <b>100</b> points</li>
    </ul>
  </div>

</div>


</div>







@endsection