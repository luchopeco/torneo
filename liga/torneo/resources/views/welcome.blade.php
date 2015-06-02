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
                <a href="#services" class=" btn button-custom btn-custom-two">CONOCE LAS INSTALACIONES </a>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END-->

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
                   <!-- www.TuTiempo.net - Ancho:206px - Alto:238px -->
                   <div id="TT_tBsAbBYxt2IKdFxAjAzzzjzDDWaA1EClbtEd1syoKkz"><a href="http://www.tutiempo.net">El Tiempo</a></div>
                   <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tBsAbBYxt2IKdFxAjAzzzjzDDWaA1EClbtEd1syoKkz"></script>

                </div>

             </div>
          </div>
    </div>
</section>

@endsection
@section('script')

@endsection