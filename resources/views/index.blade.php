<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>Aplikasi Gallery Photo</title>
<!--
Snapshot Template
http://www.templatemo.com/tm-493-snapshot

Zoom Slider
https://vegas.jaysalvat.com/

Caption Hover Effects
http://tympanus.net/codrops/2013/06/18/caption-hover-effects/
-->
	<link rel="stylesheet" href="{{ asset('') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('') }}/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('') }}/css/font-awesome.min.css">
  	<link rel="stylesheet" href="{{ asset('') }}/css/component.css">
	
    <link rel="stylesheet" href="{{ asset('') }}/css/owl.theme.css">
	<link rel="stylesheet" href="{{ asset('') }}/css/owl.carousel.css">
	<link rel="stylesheet" href="{{ asset('') }}/css/vegas.min.css">
	<link rel="stylesheet" href="{{ asset('') }}/css/style.css">

	<!-- Google web font  -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->

  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
        <a href="#top" class="navbar-brand smoothScroll">U-Pics</a>
      </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#top" class="smoothScroll"><span>Home</span></a></li>
            <li><a href="#about" class="smoothScroll"><span>About</span></a></li>
            <li><a href="#gallery" class="smoothScroll"><span>Gallery</span></a></li>
          </ul>
       </div>

    </div>
  </div>


<!-- Home section -->

<section id="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="wow fadeInUp" data-wow-delay="0.6s">Let's take a snapshot</h1>
        <p class="wow fadeInUp" data-wow-delay="0.9s">Snapshot website template is available for free download. Anyone can modify and use it for any site. Please tell your friends about <a rel="nofollow" href="http://www.templatemo.com">templatemo</a>. Thank you.</p>
        <a href="{{ route('foto.index') }}" class="smoothScroll btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s">LOGIN</a>
      </div>

    </div>
  </div>
</section>


<!-- About section -->

<section id="about">
  <div class="container">
    <div class="row">

      <div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-thumb">
          <h1>Background</h1>
          <p>Quisque tempor bibendum dolor at volutpat. Suspendisse venenatis quam sed libero euismod feugiat. In cursus nisi vitae lectus facilisis mollis. Nullam scelerisque, quam nec iaculis vulputate.</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
        <img src="{{ asset('') }}/images/about-img.jpg" class="img-responsive img-circle" alt="About">
      </div>

    </div>
  </div>
</section>


<!-- Gallery section -->

<section id="gallery">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title">
          <h1>Gallery</h1>
          <p>Nullam scelerisque, quam nec iaculis vulputate, arcu ligula sollicitudin nisl, ac volutpat erat nulla a arcu.</p>
        </div>
      </div>

      <ul class="grid cs-style-4">
        @foreach ($fotos as $foto)
        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{ Storage::url($foto->image) }}" alt="image 1"></div>
            <figcaption>
              <h1>{{ $foto->judul_foto }}</h1>
              <small>{{ Str::words($foto->deskripsi_foto, 10) }}</small>
              <a href="{{ route('foto.show', ['foto' => $foto]) }}">Lihat selengkapnya</a>
            </figcaption>
          </figure>
        </li>
        @endforeach 
      </ul>

    </div>
  </div>
</section>

<!-- Back top -->
<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- Javascript  -->
<script src="{{ asset('') }}/js/jquery.js"></script>
<script src="{{ asset('') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('') }}/js/vegas.min.js"></script>
<script src="{{ asset('') }}/js/modernizr.custom.js"></script>
<script src="{{ asset('') }}/js/toucheffects.js"></script>
<script src="{{ asset('') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('') }}/js/smoothscroll.js"></script>
<script src="{{ asset('') }}/js/wow.min.js"></script>
<script src="{{ asset('') }}/js/custom.js"></script>

</body>
</html>