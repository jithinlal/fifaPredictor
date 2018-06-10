<!DOCTYPE html>
<html>
<head>
  <title>Fifa Predict 2018</title>
  <link rel="shortcut icon" href="/prediction_logo/favicon.ico" />

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }

    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }

	.image_done {
		position: relative;
   		width: 100%;
	}

	h2 {
		position: absolute;
		top: 200px;
		left: 0;
		width: 100%;
	}

	h2 span {
		color: white;
		font: bold 24px/45px Helvetica, Sans-Serif;
		letter-spacing: -1px;
		background: rgb(0, 0, 0); /* fallback color */
		background: rgba(0, 0, 0, 0.7);
		padding: 10px;
	}
  </style>
</head>
<body background="/home_img/trophy.jpg">
  <section class="slider slider-for">
    <div>
      <img src="http://placehold.it/300x150?text=haiiiiii">
	  {{-- <h2>A Movie in the Park:<br />Kung Fu Panda</h2> --}}
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
    <div>
      <img src="http://placehold.it/300x150?text=10">
    </div>
	<div>
      <img src="http://placehold.it/300x150?text=11" class="goFav">
    </div>
  </section>



  <section class=" slider slider-nav">
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
    <div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
	<div>
      <img src="http://placehold.it/100x100?text=6">
    </div>
	<div>
      <img src="http://placehold.it/100x100?text=6" >
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {

		$('.goFav').on('click', function(){
			window.location.href = '/favTeam';
		});

      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 1
      });


		$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		centerMode: true,
		focusOnSelect: true
		});
    });
</script>

</body>
</html>
