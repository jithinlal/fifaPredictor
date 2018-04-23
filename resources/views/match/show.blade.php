<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

        <meta name="author" content="">



        <title>:: avana LLC ::</title>

		<link rel="shortcut icon" href="/avana/images/favicon.ico" type="image/x-icon">



        <!-- style -->

        <link href="/avana/css/style.css" rel="stylesheet" type="text/css">

        <!-- style -->

        <!-- bootstrap -->

        <link href="/avana/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- responsive -->

        <link href="/avana/css/responsive.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="/avana/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="/avana/css/effects/set2.css" rel="stylesheet" type="text/css">

        <link href="/avana/css/effects/normalize.css" rel="stylesheet" type="text/css">

        <link href="/avana/css/effects/component.css"  rel="stylesheet" type="text/css" >

	</head>



    <body>

        <!-- main -->

        <main role="main-home-wrapper" class="container">



            <div class="row">



            	<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

                	<article role="pge-title-content">

                    	<header>

                        	<h2><span>{{$match->type}}</span></h2> <h2>{{$teams[$match->home_team]->name}}</h2>
                            <h1>v/s</h1>
                            <h2>{{$teams[$match->away_team]->name}}</h2>

                        </header>

                        <p>{{$stadia[$match->stadium_id]->name}}</p>
                        <h5>{{$stadia[$match->stadium_id]->city}}</h5>

                    </article>

                </section>



                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

                	<figure class="effect-oscar">

                    	<img src="/stadiums/{{$stadia[$match->stadium_id]->name}}.jpg" alt="" class="img-responsive"/>

                        <figcaption>

                        	<h2>{{$stadia[$match->stadium_id]->name}}<span> {{$stadia[$match->stadium_id]->city}}</span></h2>

							<p>{{\Carbon\Carbon::parse($match->date)->toDayDateTimeString()}}</p>

							<a href="works-details.html">View more</a>

                        </figcaption>

                    </figure>

                </section>



                <div class="clearfix"></div>



                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

                	<ul class="grid-lod effect-2" id="grid">

                    	<li>

                        	<figure class="effect-oscar">

                            <img src="/avana/images/home-images/image-2.jpg" alt="" class="img-responsive"/>
                            {{-- <img src="/avana/images/home-images/image-2.jpg" alt="" class="img-responsive"/> --}}

                            <figcaption>



                                    <h2>{{$teams[$match->home_team]->name}} <span>{{$teams[$match->away_team]->name}}</span></h2>

                                    <p>Project for Thonik, design studio based in Amsterdam</p>

                                    <a href="works-details.html">View more</a>



                            </figcaption>

                        </figure>

                        </li>



                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>

                            <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Studio Thonik <span>Exhibition</span></h2>

                                    <p>Project for Thonik, design studio based in Amsterdam</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Studio Thonik <span>Exhibition</span></h2>

                                    <p>Project for Thonik, design studio based in Amsterdam</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Studio Thonik <span>Exhibition</span></h2>

                                    <p>Project for Thonik, design studio based in Amsterdam</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-4.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                    </ul>

                </section>



                <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">

                	<ul class="grid-lod effect-2" id="grid">

                    	<li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Anatome Milano <span>Galleria</span></h2>

                                <p>Galerie Anatome based in Paris</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-5.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Anatome Milano <span>Galleria</span></h2>

                                <p>Galerie Anatome based in Paris</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-5.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                               <h2>Anatome Milano <span>Galleria</span></h2>

                                <p>Galerie Anatome based in Paris</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                             <figure class="effect-oscar">

                                <img src="/avana/images/home-images/image-5.jpg" alt="" class="img-responsive"/>

                                 <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                            </figure>

                        </li>

                        <li>

                       	 	<figure class="effect-oscar">

                            <img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>Anatome Milano <span>Galleria</span></h2>

                                <p>Galerie Anatome based in Paris</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                        <li>

                        	<figure class="effect-oscar">

                            <img src="images/home-images/image-5.jpg" alt="" class="img-responsive"/>

                             <figcaption>

                                <h2>A Brand <span>new Agency</span></h2>

                                <p>Over 40,000 customers use our themes to power their</p>

                                <a href="works-details.html">View more</a>

                            </figcaption>

                        </figure>

                        </li>

                    </ul>

                </section>

                <div class="clearfix"></div>

            </div>

        </main>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <script src="/avana/js/jquery.min.js" type="text/javascript"></script>

        <!-- custom -->

		<script src="/avana/js/nav.js" type="text/javascript"></script>

        <script src="/avana/js/custom.js" type="text/javascript"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script src="/avana/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="/avana/js/effects/masonry.pkgd.min.js"  type="text/javascript"></script>

		<script src="/avana/js/effects/imagesloaded.js"  type="text/javascript"></script>

		<script src="/avana/js/effects/classie.js"  type="text/javascript"></script>

		<script src="/avana/js/effects/AnimOnScroll.js"  type="text/javascript"></script>

        <script src="/avana/js/effects/modernizr.custom.js"></script>

        <!-- jquery.countdown -->

        <script src="/avana/js/html5shiv.js" type="text/javascript"></script>

    </body>

</html>