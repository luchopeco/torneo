<?php
$listImagen=\torneo\Imagen::where('idtipo_imagen', 1)->where('mostrar',1)->get();
$ruta= Route::currentRouteAction();
?>
<!DOCTYPE html>
<html lang="es" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Tifosi" />
<meta name="author" content="Wiphala Sistemas" />
<link rel="shortcut icon" href="faviconPublico.ico" />
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/">

<img src="/imagenes/logo.png">

</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
@if($ruta=='torneo\Http\Controllers\WelcomeController@index')
<li class="active"><a href="/">HOME</a></li>
@else
<li><a href="/">HOME</a></li>
@endif
@if($ruta=='torneo\Http\Controllers\WelcomeController@instalaciones')
<li class="active" ><a href="/instalaciones">SUCURSALES</a></li>
@else
<li><a href="/instalaciones">SUCURSALES</a></li>
@endif

<li><a href="inscripcion">INSCRIPCION</a></li>
@if($ruta=='torneo\Http\Controllers\WelcomeController@fixture')
<li class="active"><a href="/fixture">FIXTURE</a></li>
@else
<li><a href="/fixture">FIXTURE</a></li>
@endif

@if($ruta=='torneo\Http\Controllers\WelcomeController@estadisticas')
<li class="active"><a href="/estadisticas">ESTADISTICAS</a></li>
@else
<li><a href="/estadisticas">ESTADISTICAS</a></li>
@endif

@if($ruta=='torneo\Http\Controllers\WelcomeController@estadisticas')
<li class="active"><a href="#">NOTICIAS</a></li>
@else
<li><a href="#">NOTICIAS</a></li>
@endif

@if($ruta=='torneo\Http\Controllers\WelcomeController@equipo')
<li class="active"><a href="/equipo">EQUIPOS</a></li>
@else
<li><a href="/equipo">EQUIPOS</a></li>
@endif

</ul>
</div>

</div>
</div>

@yield('content')
<!--CONTACT SECTION START-->
<section id="contact" >
    <div id="contacto">
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Contacto</h3>
                    <hr />
                </div>
            </div>
            <div class="row animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="contact-wrapper text-center">
                        <h3>COMPLETE NUESTRO FORMULARIO</h3>
                        <div class="row">
                            <div class="col-md-12">
                                {!!Form::Text('nombre',null,['class'=>' form-control','required','placeholder'=>'NOMBRE Y APELLIDO'])!!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::Text('mail',null,['class'=>' form-control','required','placeholder'=>'MAIL'])!!}
                            </div>
                            <div class="col-md-6">
                                {!!Form::Text('ciudad',null,['class'=>' form-control','required','placeholder'=>'CIUDAD'])!!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12">
                                {!!Form::submit('Enviar', array('class' => 'btn btn-danger btn-block'))!!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="contact-wrapper">
                        <h3>Contacto Rapido</h3>
                        <h4><strong>Email : </strong> ligatifosi@hotmail.com</h4>
                        <h4><strong>Tel : </strong>(0341)-156 56 3365/153 43 0596</h4>
                        <h3>Datos Personales</h3>
                        <h4><strong>ZONA NORTE: Don Orione 690</strong></h4>
                        <h4><strong>FUNES CITY: Rondeau 591</strong></h4>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <div class="contact-wrapper" >
                         <img class="img-responsive center-block " src="/imagenes/footer/gatorade.png">
                    </div>
                </div>
            </div>
            <div class="row animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12">
                    <div class="marcas row">
                        <div class=" col-sm-2 col-xs-offset-0"></div>
                        <div class="col-xs-3 col-sm-1"><img src="imagenes/logo.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-xs-3 col-sm-1"><img src="imagenes/footer/sts.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/quilmes.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/pepsi.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/auckland.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/photoclub.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/nassau.png" class="img-responsive inline" alt="Responsive image"/></div>
                        <div class="col-sm-1 col-xs-3"><img src="imagenes/footer/northland.png" class="img-responsive inline" alt="Responsive image"/></div>

                    </div>
                </div>
            </div>
             <div class="row animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12">
                    <div class="powerby text-center">
                    2015-TODOS LOS DERECHOS RESERVADOS -DISEÑO <a target="_blank" href="#">FABRICA</a> // DESARROLLO <a target="_blank" href="http://www.wiphalasistemas.com.ar">Wiphala Sistemas</a>
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
