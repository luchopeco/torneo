@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<div id="" class="margin-top">
<section id="equipo">
    <div class="container">
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-3 col-md-offset-0 ">
               <div><h1>LOS RAMONES</h1></div>
               <div class="equipos-wrapper">
                   <div class="row">
                       <img class="img-responsive center-block" src="imagenes/Slider Home-9.jpg">
                       <img class="img-responsive center-block" src="imagenes/Slider Home-10.jpg">
                        <div class="col-xs-6"><a href="#">+CAMBIAR ESCUDO</a></div>
                        <div class="col-xs-6 text-right"><a href="#">+CAMBIAR FOTO</a></div>
                   </div>
               </div>

             </div>
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-6 col-md-offset-0">
                <div class="equipos-wrapper-redondo alto50">
                    LIGA TIFOSI TE INFORMA: <span>POR FAVOR SALDAR DEUDA PENDIENTE O NO PODRAN JUGAR</span>
                </div>
             </div>
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-3 col-md-offset-0">
                <div class="equipos-wrapper-redondo alto50">
                    <div class="row">
                        <div class="col-xs-9"> BIENVENIDO: <span>LOS RAMONES</span> </div>
                        <div class="col-xs-3"> <a href="/equiposalir" class=" btn btn-danger btn-block">SALIR</a></div>
                    </div>
                 </div>
                <div class="row estadistica">
                    <div class="col-xs-2 col-estadistica text-center">
                    1
                    </div>
                    <div class="col-xs-10"> POSICION</div>
                </div>
                <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    12
                    </div>
                    <div class="col-xs-10"> PARTIDOS</div>
                </div>
                 <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    8
                    </div>
                    <div class="col-xs-10"> GANADOS</div>
                </div>
                <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    10
                    </div>
                    <div class="col-xs-10"> EMPATADOS</div>
                </div>
                <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    10
                    </div>
                    <div class="col-xs-10"> PERDIDOS</div>
                </div>
                <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    10
                    </div>
                    <div class="col-xs-10"> GOLES FAVOR</div>
                </div>
                <div class="row estadistica ">
                    <div class="col-xs-2 col-estadistica text-center">
                    10
                    </div>
                    <div class="col-xs-10"> GOLES CONTRA</div>
                </div>
             </div>
        </div>
    </div>
</section>
</div>
@endsection
@section('script')
<script type="text/javascript">

 </script>
@endsection