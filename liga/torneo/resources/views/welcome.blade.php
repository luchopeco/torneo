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
                <a href="#instalaciones" class=" btn button-custom btn-custom-two">CONOCE LAS INSTALACIONES </a>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END-->


<!-- seccion instalaciones -->

<section id="instalaciones">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3>INSTALACIONES</h3>
                <hr>
            </div>
        </div>
        <div class="row animate-in text-center" data-anim-type="fade-in-up">
           
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="work-wrapper">
                <a class="fancybox-media" href="/imagenes/home/001grande.jpg">
                    <img class="img-responsive" src="/imagenes/home/001grande.jpg">
                </a>
                <h4>PARRILLEROS CON MESAS</h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                
                <div class="work-wrapper">
                    <H4>TIFOSI CUENTA CON UN COMPLEJO TOTALMENTE EQUIPADO, CON CANCHAS DE 5 Y 7.</H4>
                </div>
            </div>

             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="work-wrapper">
                <a class="fancybox-media" href="/imagenes/home/002grande.jpg">
                    <img class="img-responsive" src="/imagenes/home/002grande.jpg">
                </a>
                <h4>CANCHAS DE 5 Y 7</h4>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="work-wrapper">
                <a class="fancybox-media" href="/imagenes/home/003grande.jpg">
                    <img class="img-responsive" src="/imagenes/home/003grande.jpg">
                </a>
                <h4>VESTUARIOS LOCAL Y VISITANTE</h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="work-wrapper">
                <a class="fancybox-media" href="/imagenes/home/005grande.jpg">
                    <img class="img-responsive" src="/imagenes/home/005.jpg">
                </a>
                <h4>LUGAR AL AIRE LIBRE</h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="work-wrapper">
                <a class="fancybox-media" href="/imagenes/home/004grande.jpg">
                    <img class="img-responsive" src="/imagenes/home/004grande.jpg">
                </a>
                <h4>SALÓN PARA EVENTOS Y CUMPLEAÑOS</h4>
                </div>
            </div>
            

        </div>
    </div>
</section>


<!-- seccion instalaciones -->

<section id="services">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3>DATOS DE LA ULTIMA FECHA</h3>
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
                          <h3>Pronostico Proxima Fecha</h3>
                          <hr>
                      </div>
                </div>
                <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">

                    <div class="services-wrapper">

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


                  <div id="cont_05141d85783d163d304e277dd8545eaf" class="center-block">
                    <span id="h_05141d85783d163d304e277dd8545eaf"><a href="http://www.meteored.com.ar/tiempo-en_Rosario-America+Sur-Argentina-Santa+Fe--1-13586.html" target="_blank" style="color:#808080; font-family:7; font-size:14px;"></a></span>
                    <script type="text/javascript" async src="http://www.meteored.com.ar/wid_loader/05141d85783d163d304e277dd8545eaf"></script>
                  </div>
                 

                </div>

             </div>
          </div>
    </div>
</section>

@endsection
@section('script')

@endsection