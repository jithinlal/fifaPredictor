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
      <img src="/rule_img/main/1.png">
    </div>
    <div>
      <img src="/rule_img/main/2.png">
    </div>
    <div>
      <img src="/rule_img/main/3.png">
    </div>
    <div>
      <img src="/rule_img/main/4.png">
    </div>
    <div>
      <img src="/rule_img/main/5.png">
    </div>
    <div>
      <img src="/rule_img/main/6.png">
    </div>
    <div>
      <img src="/rule_img/main/7.png">
    </div>
    <div>
      <img src="/rule_img/main/8.png">
    </div>
    <div>
      <img src="/rule_img/main/9.png">
    </div>
    <div>
      <img src="/rule_img/main/10.png">
    </div>
    <div>
      <img src="/rule_img/main/11.png">
    </div>
    <div>
      <img src="/rule_img/main/12.png">
    </div>
    <div>
      <img src="/rule_img/main/13.png">
    </div>
    <div>
      <img src="/rule_img/main/14.png">
    </div>
    <div>
      <img src="/rule_img/main/15.png">
    </div>
    <div>
      <img src="/rule_img/main/16.png">
    </div>
    <div>
      <img src="/rule_img/main/17.png">
    </div>
	<div>
      <img src="/rule_img/main/18.png" class="goFav">
    </div>
  </section>



  <section class=" slider slider-nav">
    <div>
      <img src="/rule_img/side/1.png">
    </div>
    <div>
      <img src="/rule_img/side/2.png">
    </div>
    <div>
      <img src="/rule_img/side/3.png">
    </div>
    <div>
      <img src="/rule_img/side/4.png">
    </div>
    <div>
      <img src="/rule_img/side/5.png">
    </div>
    <div>
      <img src="/rule_img/side/6.png">
    </div>
    <div>
      <img src="/rule_img/side/7.png">
    </div>
    <div>
      <img src="/rule_img/side/8.png">
    </div>
    <div>
      <img src="/rule_img/side/9.png">
    </div>
	<div>
      <img src="/rule_img/side/10.png">
    </div>
	<div>
      <img src="/rule_img/side/11.png" >
    </div>
	<div>
      <img src="/rule_img/side/12.png" >
    </div>
	<div>
      <img src="/rule_img/side/13.png" >
    </div>
	<div>
      <img src="/rule_img/side/14.png" >
    </div>
	<div>
      <img src="/rule_img/side/15.png" >
    </div>
	<div>
      <img src="/rule_img/side/16.png" >
    </div>
	<div>
      <img src="/rule_img/side/17.png" >
    </div>
	<div>
      <img src="/rule_img/side/18.png">
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
