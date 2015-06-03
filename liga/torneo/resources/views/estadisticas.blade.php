@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<div id="estadisticas">
<section id="services">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3>Estadisticas</h3>
                <hr>
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="fechas-wrapper  text-center">
                    <div class="row">
                        <div class=" col-sm-2 col-xs-12">
                            <img class="img-responsive center-block" src="/imagenes/home/escudotifosi.png">
                        </div>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h3>ELEGIR CATEGORIA</h3>
                        </div>
                        <div class="col-md-6 col-xs-12">
                           {!!Form::select('idtorneo', $listTorneosCombo,null,array('class' => 'form-control','onchange'=>'buscarEstadisticaXTorneo()','id'=>'idtorneo'))!!}
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div id="contenidoEstadistica">

             </div>
        </div>
    </div>
</section>
</div>
@endsection
@section('script')
<script type="text/javascript">
function buscarEstadisticaXTorneo()
 {
    var id_articulo=$("#idtorneo").val();
    $.ajax({
         url:"/estadisticastorneo/"+id_articulo,
         type: "GET",
         dataType: "HTML"
        })
    .done(function(response){
           $("#contenidoEstadistica").html(response);
        })
        .fail(function(){
            alert(id_articulo);
        });
 }
 $(function() {
   buscarEstadisticaXTorneo();
 });
 </script>
@endsection