<!DOCTYPE html>
<html lang="es" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title> @yield('title')</title>
<!-- BOOTSTRAP CORE CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="assets/css/ionicons.css" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- FANCYBOX POPUP STYLES -->
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<!-- STYLES FOR VIEWPORT ANIMATION -->
<link href="assets/css/animations.min.css" rel="stylesheet" />
<!-- CUSTOM CSS -->
<link href="assets/css/style-red.css" rel="stylesheet" />
<link href="assets/css/css.css" rel="stylesheet" />
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body data-spy="scroll" data-target="#menu-section">
<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">

<img src="/imagenes/logo.png">

</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="#home">HOME</a></li>
<li><a href="#services">INSTALACIONES</a></li>
<li><a href="#pricing">INSCRIPCION</a></li>
<li><a href="#work">FIXTURE</a></li>
<li><a href="#team">ESTADISTICAS</a></li>
<li><a href="#grid">SANCIONES</a></li>
<li><a href="#contact">MEDIA</a></li>
<li><a href="#contact">CONTACTO</a></li>
</ul>
</div>

</div>
</div>

@yield('content')
<!--CONTACT SECTION START-->
<section id="contact" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<h3>Contact Details </h3>
<hr />

</div>
</div>

<div class="row animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>We Are Social</h3>
<p>
Aliquam tempus ante placerat,
consectetur tellus nec, porttitor nulla.
</p>
<div class="social-below">
<a href="#" class="btn button-custom btn-custom-two" > Facebook</a>
<a href="#" class="btn button-custom btn-custom-two" > Twitter</a>
<a href="#" class="btn button-custom btn-custom-two" > Google +</a>
</div>
</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>Quick Contact</h3>
<h4><strong>Email : </strong> info@yuordomain.com </h4>
<h4><strong>Call : </strong> +09-88-99-77-55 </h4>
<h4><strong>Skype : </strong> Yujhaeu78 </h4>
</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>Address : </h3>
<h4>230/45 , New way Lane , </h4>
<h4>United States</h4>
<div class="footer-div" >
&copy; 2015 YourDomain | <a href="http://www.designbootstrap.com/" target="_blank" >by DesignBootstrp</a>
</div>
</div>

</div>

</div>


</div>
</section>
<!--CONTACT SECTION END-->

<!--Social-->
<div class="social-buton social-buton-f">
    <a href="" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
</div>
<div class="social-buton social-buton-t">
    <a href="" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
</div>
<div class=" social-buton social-buton-g">
   <a href="" target="_blank"> <i class="fa fa-google-plus fa-2x"></i></a>
</div>
<!--Social Fin-->

<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.js"></script>
<!-- EASING SCROLL SCRIPTS PLUGIN -->
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<!-- VEGAS SLIDESHOW SCRIPTS -->
<script src="assets/js/jquery.easing.min.js"></script>
<!-- FANCYBOX PLUGIN -->
<script src="assets/js/source/jquery.fancybox.js"></script>
<!-- ISOTOPE SCRIPTS -->
<script src="assets/js/jquery.isotope.js"></script>
<!-- VIEWPORT ANIMATION SCRIPTS   -->
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

<script>
       $(function () {
            $.vegas('slideshow', {
            backgrounds: [
                <?php $listImagen=\torneo\Imagen::all()->where('idtipo_imagen', 1)->where('mostrar',1); ?>
                @foreach($listImagen as $imagen)
               { src: 'imagenes/{{$imagen->imagen}}', fade: 1000, delay: 9000},
                @endforeach
            //{ src: 'assets/img/2.jpg', fade: 1000, delay: 9000 },
            ]
            })('overlay', {
            /** SLIDESHOW OVERLAY IMAGE **/
            src: 'assets/js/vegas/overlays/06.png' // THERE ARE TOTAL 01 TO 15 .png IMAGES AT THE PATH GIVEN, WHICH YOU CAN USE HERE
            });
     });
</script>

    @yield('script')
</body>

</html>
