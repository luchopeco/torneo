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
                          <div class="item active">
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
                <a href="#services" class=" btn button-custom btn-custom-two">CONOCE LAS INSTALACIONES </a>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END-->

<section id="services">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-anim-type="fade-in-up">
                <h3>DATOS DE LA ULTIMA FECHA</h3>
                <hr>
            </div>
        </div>
        <div class="row" data-anim-type="fade-in-up">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="services-wrapper">
                    <img class="img-responsive" src="/imagenes/imagen-slider4.jpg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="services-wrapper">
                    <img class="img-responsive" src="/imagenes/imagen-slider4.jpg">
                 </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="services-wrapper">
                    <img class="img-responsive" src="/imagenes/imagen-slider4.jpg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="services-wrapper">
                    <img class="img-responsive" src="/imagenes/imagen-slider4.jpg">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection