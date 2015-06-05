@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<!--HOME SECTION START-->
<div id="home" >
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
                  <div id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up">
                      <div class="carousel-inner">
                          <div class="item active ">
                                <img class="img-responsive center-block" src="/imagenes/home/escudotifosi.png">
                              <h1>
                              <strong>EL NUEVO COMPLEJO EN FUNES EQUIPADO PARA LA MEJOR LIGA DE FUTBOL 5 DEL GRAN ROSARIO</strong>
                              </h1>
                              <p>
                              Lorem ipsumdolor sitamet, consect adipiscing elit
                              Lorem ipsumdolor sitamet, consect adipiscing elit.
                              Lorem ipsumdolor sitamet, consect adipiscing elit
                              Lorem ipsumdolor sitamet, consect adipiscing elit.
                              </p>
                          </div>
                      </div>
                  </div>
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
            <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me">
                <a href="/instalaciones" class=" btn button-custom btn-custom-two">CONOCE LAS INSTALACIONES </a>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END-->

<!--Noticias SECTION START-->
<section id="team" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Noticias </h3>

<hr />


<!-- boton facebook para compartir una web <div class="fb-share-button" data-href="#team" data-layout="icon_link"></div>-->
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
@foreach($listNoticias as $noticia)
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="team-inner" style="background-image: url('/imagenes/{{$noticia->imagen}}')" >
<a target="_blank" href="http://www.facebook.com/sharer.php?u=http://www.torneo.com/#team" href="#" target="_blank" > 
   <i class="fa fa-facebook-f" ></i>
</a>

<!--<div class="fb-share-button" data-href="#team" data-layout="icon_link"></div>-->






</div>
<div class="description">
<h3> {{$noticia->titulo}}</h3>
<h5> <strong> Developer & Designer </strong></h5>
<p>
{{$noticia->titulo}}
</p>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
<!--NoticiasSECTION END-->


<section id="services">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3> JUGADORES DE LA ULTIMA FECHA</h3>
                <hr>
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
            @foreach($listFiguras as $fig)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="services-wrapper">
                <a class="fancybox-media" href="/imagenes/{{$fig->imagen}}">
                    <img class="img-responsive" src="/imagenes/{{$fig->imagen}}">
                </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section id="grid">
    <div class="container">
        <div class="col-md-6 col-xs-12">
            <div class="row text-center header" >
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                      <h3>Equipo Ideal</h3>
                      <hr>
                  </div>
            </div>
            <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                               @foreach($listEquipoIdeal as $fig)
                                <a class="fancybox-media" href="/imagenes/{{$fig->imagen}}">
                                    <img class="img-responsive" src="/imagenes/{{$fig->imagen}}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-6 col-xs-12">
                <div class="row text-center header" >
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                          <h3>Pronostico</h3>
                          <hr>
                      </div>
                </div>
                <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">

                    <div class="pronostico-wrapper">


<!-- yr.no -->
<!--
<script src="http://www.yr.no/place/Argentina/Santa_Fe/Rosario/external_box_three_days.js"></script><noscript><a href="http://www.yr.no/place/Argentina/Santa_Fe/Rosario/">yr.no: Clima en  Rosario</a></noscript>
-->

<!--tutiempo-->
                 <!--
                  <div style="width:315px;background-color:white;">
                   
                                     <div id="TT_tBsAbBYxt2IKdFxAjAzzzjzDDWaA1EClbtEd1syoKkz"><a href="http://www.tutiempo.net">El Tiempo</a></div>
                                     <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tBsAbBYxt2IKdFxAjAzzzjzDDWaA1EClbtEd1syoKkz"></script>
                  </div>
                  -->


                  <!-- meteored-->




              <div id="cont_ade9062ccc1b67e7b6b7d24660c317a5" class="center-block">
                <span id="h_ade9062ccc1b67e7b6b7d24660c317a5"><a id="a_ade9062ccc1b67e7b6b7d24660c317a5" href="http://www.meteored.com.ar/" target="_blank" style="color:#808080;font-family:Helvetica;font-size:14px;"></a></span>
                <script type="text/javascript" async src="http://www.meteored.com.ar/wid_loader/ade9062ccc1b67e7b6b7d24660c317a5"></script>
              </div>


                </div>

             </div>
          </div>
    </div>
</section>

@endsection
@section('script')

@endsection