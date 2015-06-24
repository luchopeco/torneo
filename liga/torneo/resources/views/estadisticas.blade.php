@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<div id="estadisticas" class="margin-top">
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
                            <div id="imagentorneo"></div>

                            </div>
                            <div class="col-sm-4 col-xs-12 text-center">
                                <h3 class="text-center">ELEGIR TORNEO</h3>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                               {!!Form::select('idtipo_torneo', $listTiposTorneosCombo,null,array('class' => 'form-control','onchange'=>'buscarTorneoXTipoTorneo()','id'=>'idtipo_torneo'))!!}
                            </div>
                        </div>
                    </div>
              </div>

             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="fechas-wrapper  text-center">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 text-center">
                            <h3 class="text-cener">ELEGIR CATEGORIA</h3>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                        <div id="combotorneo"></div>

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
    <div id="modalMensaje"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h3 class="text-danger">No se ha encontrado una Categoria </h3>
            </div>
            <div class=" modal-body ">
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
function buscarTorneoXTipoTorneo()
 {
    var id_articulo=$("#idtipo_torneo").val();
    $.ajax({
         url:"/torneoportipotorneo/"+id_articulo,
         type: "GET",
         dataType: "HTML"
        })
    .done(function(response){
           $("#combotorneo").html(response);
           if(id_articulo==1)
           {
                $("#imagentorneo").html("<img class='img-responsive center-block' src='/imagenes/home/escudotifosi.png'>");
           }
           else if(id_articulo==2)
           {
               $("#imagentorneo").html("<img class='img-responsive center-block' style='padding-top: 5px' src='/imagenes/home/ragazza02.png'>");
           }
           buscarEstadisticaXTorneo();
        })
        .fail(function(){
            alert(id_articulo);
        });

 }
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
           // alert(id_articulo);
             $("#contenidoEstadistica").html('');
              $("#modalMensaje").modal("show");
        });
 }
 $(function() {
    buscarTorneoXTipoTorneo();

 });
 </script>
@endsection