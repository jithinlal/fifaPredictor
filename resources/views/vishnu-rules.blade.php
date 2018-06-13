<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Rules |WCpredict 2k18</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="/vishnu-point-system/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="/vishnu-point-system/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="/vishnu-point-system/css/animate.css" rel="stylesheet" />
	<link href="/vishnu-point-system/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/vishnu-point-system/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="/vishnu-point-system/css/demo.css" rel="stylesheet" />
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('/vishnu-point-system/img/wizard-book.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="http://creative-tim.com">
	         <div class="logo-container">
	            <!-- <div class="logo">
	                <img src="/vishnu-point-system/img/new_logo.png">
	            </div>
	            <div class="brand">
	                WCpredict 2018
	            </div> -->
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<!-- <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
			<div class="brand">MK</div>
			<div class="made-with">Made with <strong>Material Kit</strong></div>
		</a> -->

	    <!--   Big container   -->
	    <div class="container">			
	        <div class="row">
				<div class="footer">
					<div class="container text-center bold-2">
						Hi, welcome to wcpredict.club . This is a simple Prediction Site for The Fifa World Cup 2018, Russia.<br>
						Here you can predict lots of things about the tounament, like who will win the World Cup, Golden Boot etc.<br>
						Before each match, you can predict the scoreline, hat trick probablility, etc in that particular match.<br>
						Predictions give you points, but only if you get them right. Wrong predictions may lead to you losing points.<br>
						All the available predictions, the points you gain and lose via each prediction, are given below, in detail.<br>
						Also, you get bonus points according to the performance of the team you selected as your Favourite Team.<br>   
						Please note that the Main Predictions will lock exactly at {{ \App\Meliorate::getOverallLockTime() }} .<br> 
						Also, each match is locked {{ \App\Meliorate::currentLockTimeGap() }} Minutes before kickoff.
					</div>
				</div>
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container ruletable">
						
		                <div class="card wizard-card" data-color="red" id="wizard">
		                     <form action="" method=""> 
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<!-- <div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Book a Room
		                        	</h3>
									<h5>This information will let us know more about you.</h5>
		                    	</div> -->
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">Main predictions</a></li>
			                            <li><a href="#captain" data-toggle="tab">Match Predictions</a></li>
			                            <li><a href="#description" data-toggle="tab">Bonus Points</a></li>
			                        </ul>
								</div>

                                
                                
		                        <div class="tab-content">
								
		                            <div class="tab-pane" id="details">
									<h4 class="info-text">Rules for Main Predictions </h4>
										<div class="row">
										<div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
		                                                    <img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/wcwinner.png" data-wow-duration="2s" data-wow-delay=".2s">
		                                                </div>
		                                                 <h6 class="bold">World Cup Winner</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
															<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/runnerup.png"  data-wow-duration="2s" data-wow-delay=".3s">		
		                                                </div>
		                                                 <h6 class="bold">Runner's up</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/third.png"  data-wow-duration="2s" data-wow-delay=".4s">
		                                                </div>
		                                                 <h6 class="bold">third place</h6>
		                                            </div>
		                                        </div>
											</div>
		                                    <div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/fourth.png"  data-wow-duration="2s" data-wow-delay=".5s">
		                                                </div>
		                                                 <h6 class="bold">fourth place</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/each.png"  data-wow-duration="2s" data-wow-delay=".6s">
		                                                </div>
		                                                 <h6 class="bold">each group winner</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/goldenboot.png"   data-wow-duration="2s" data-wow-delay=".7s">
		                                                </div>
		                                                 <h6 class="bold">Golden boot</h6>
		                                            </div>
		                                        </div>
											</div>
											<div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/goldenball.png"   data-wow-duration="2s" data-wow-delay=".8s">
		                                                </div>
		                                                 <h6 class="bold">Golden Ball</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/youngplayer.png"  data-wow-duration="2s" data-wow-delay=".9s">
		                                                </div>
		                                                 <h6 class="bold">Best young player</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/goldenglove.png"  data-wow-duration="2s" data-wow-delay="1s">
		                                                </div>
		                                                 <h6 class="bold">Golden Glove</h6>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="captain">
		                                <h4 class="info-text">Rules to Predict Matches </h4>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/scoreline.png"  data-wow-duration="2s" data-wow-delay=".1s">
		                                                </div>
		                                                 <h6 class="bold">Score line</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/gameresult.png"  data-wow-duration="2s" data-wow-delay=".2s">
		                                                </div>
		                                                 <h6 class="bold">game result</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/redcard.png"  data-wow-duration="2s" data-wow-delay=".3s">
		                                                </div>
		                                                 <h6 class="bold">red card</h6>
		                                            </div>
		                                        </div>
											</div>
											<div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/yellowcard.png"  data-wow-duration="2s" data-wow-delay=".4s">
		                                                </div>
		                                                 <h6 class="bold">5 yellow cards</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/owngoal.png"  data-wow-duration="2s" data-wow-delay=".5s">
		                                                </div>
		                                                 <h6 class="bold">own goal</h6>
		                                            </div>
												</div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/hattrick.png"  data-wow-duration="2s" data-wow-delay=".6s">
		                                                </div>
		                                                 <h6 class="bold">hat trick</h6>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
									<h4 class="info-text">The Bonus Point System </h4>
		                                <div class="row">
										<div class="col-sm-10 col-sm-offset-1 bold">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/winswc.png"  data-wow-duration="2s" data-wow-delay=".1s">
		                                                </div>
		                                                 <h6 class="bold">your team wins the world cup</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/winsmatch.png"  data-wow-duration="2s" data-wow-delay=".2s">
		                                                </div>
		                                                 <h6 class="bold">your team wins a match</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/teamgoal.png"  data-wow-duration="2s" data-wow-delay=".3s">
		                                                </div>
		                                                 <h6 class="bold">your team scores a goal</h6>
		                                            </div>
												</div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip">
		                                                 
		                                                <div class="icon">
														<img class="img-fluid points points-mobile wow flipInY" src="/vishnu-point-system/img/points/draw.png"  data-wow-duration="2s" data-wow-delay=".4s">
		                                                </div>
		                                                 <h6 class="bold">your team draws a match</h6>
		                                            </div>
		                                        </div>
											</div>
										</div>
										
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
	                                    <a href="/"><input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Predict Now' /></a>
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

										<div class="footer-checkbox">
											<!-- <div class="col-sm-12">
											  <div class="checkbox">
												  <label>
													  <input type="checkbox" name="optionsCheckboxes">
												  </label>
												  Subscribe to our newsletter
											  </div>
										  </div> -->
										</div>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center bold-2">
				{{-- Hi, Welcome to wcpredict.club . This is a simple Prediction Site for The Fifa World Cup 2018.<br>
				Here you can predict lots of things about the tounament, like who will win the World Cup, Golden Boot etc.<br>
				Before each match, you can predict the scoreline, hat trick probablility, etc<br>
				Predictions give you points, but only if you get them right. Wrong predictions will lead to you losing points<br>
				Each prediction, the points you gain and lose from each prediction are given above, in detail.<br>
				Also, you get bonus points according to the performance of the team you selected as your favourite team    --}}
	        </div>
	    </div>
	</div>

</body>
	<!--   Core JS Files   -->
	<script src="/vishnu-point-system/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="/vishnu-point-system/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/vishnu-point-system/js/jquery.bootstrap.js" type="text/javascript"></script>
	<script src="/vishnu-point-system/js/wow.min.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="/vishnu-point-system/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="/vishnu-point-system/js/jquery.validate.min.js"></script>
	<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</html>
