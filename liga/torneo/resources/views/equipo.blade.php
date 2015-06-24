@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('css')
 <link href="/css/dropzone.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div id="" class="margin-top">
<section id="equipo">
    <div class="container">
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-3 col-md-offset-0 ">
               <div><h1>{{$equipo->nombre_equipo}}</h1></div>
               <div class="equipos-wrapper">
                   <div class="row">
                       @if($equipo->escudo=='')
                            <img class="img-responsive center-block" style="max-height: 200px" src="imagenes/escudo-generico.png">
                       @else
                            <img class="img-responsive center-block" style="max-height: 200px"  src="imagenes/{{$equipo->escudo}}">
                       @endif
                         @if($equipo->foto=='')
                               <img class="img-responsive center-block" src="imagenes/equipo-generico.png">
                          @else
                               <img class="img-responsive center-block" src="imagenes/{{$equipo->foto}}">
                          @endif
                        <div class="col-xs-6"><a href="#" data-toggle="modal" data-target="#modalEscudo" >CAMBIAR ESCUDO</a></div>
                        <div class="col-xs-6 text-right"><a href="#" data-toggle="modal" data-target="#modalFoto">CAMBIAR FOTO</a></div>
                   </div>
               </div>

             </div>
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-6 col-md-offset-0">
                <div class="equipos-wrapper-redondo alto50">
                    LIGA TIFOSI TE INFORMA:
                    <span>{{$equipo->mensaje}}
                        @foreach($equipo->ListTorneos as $torneo)
                            {{$torneo->nombre_torneo}}
                        @endforeach
                    </span>
                </div>
             </div>
             <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-3 col-md-offset-0">
                <div class="equipos-wrapper-redondo alto50">
                    <div class="row">
                        <div class="col-xs-9"> BIENVENIDO: <span>{{$equipo->nombre_equipo}}</span> </div>
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
<div id="modalEscudo"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×</button>
            <h3>Modificando Escudo</h3>
        </div>
        <div class=" modal-body ">
            <div class="row">
                <div class="col-md-12">

                    <form method="POST" action="equipoescudoguardar" class="dropzone" id="upload" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $equipo->idequipo }}" name="idequipo">
                         <input type="hidden" value="{{ csrf_token() }}" name="file">
                         <div class="dz-message">
                             Arrastra y suelta aqui tu archivo. O simplemente haz click<br />
                         </div>
                      </form>
                </div>
                <div class="col-md-12">
                    <div class="text-danger text-center">Luego de subir la imagen. Refrescar la página para ver los  cambios</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalFoto"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×</button>
            <h3>Modificando Foto del Equipo</h3>
        </div>
        <div class=" modal-body ">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="equipofotoguardar" class="dropzone" id="upload" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $equipo->idequipo }}" name="idequipof">
                         <input type="hidden" value="{{ csrf_token() }}" name="file">
                         <div class="dz-message">
                             Arrastra y suelta aqui tu archivo. O simplemente haz click<br />
                         </div>
                      </form>
                </div>
                <div class="col-md-12">
                    <div class="text-danger text-center">Luego de subir la imagen. Refrescar la página para ver los  cambios</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/js/dropzone.js" type="text/javascript"></script>
<script type="text/javascript">

 </script>
@endsection