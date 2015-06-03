@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<div id="fixture">
<section id="services">
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3>Fixture</h3>
                <hr>
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
                <div class="fechas-wrapper  text-center col-sel-fechas">
                    <div class="center-block">
                        <img class="img-responsive center-block" src="/imagenes/home/escudotifosi.png">
                    </div>
                    <div class="text-center">
                     <h3>ELEGIR CATEGORIA</h3>
                     <p>Elige tu categoria para poder mostrarte todo el fixture</p>
                    </div>
                    {!!Form::select('idtorneo', $listTorneosCombo,null,array('class' => 'form-control','onchange'=>'buscarFixtureXTorneo()','id'=>'idtorneo'))!!}
                </div>
             </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
             <div id="contenidoFixture">

             </div>
        </div>
    </div>
</section>
</div>
@endsection
@section('script')
<script type="text/javascript">
function buscarFixtureXTorneo()
 {
    var id_articulo=$("#idtorneo").val();
    $.ajax({
         url:"/fixturetorneo/"+id_articulo,
         type: "GET",
         dataType: "HTML"
        })
    .done(function(response){
           $("#contenidoFixture").html(response);
        })
        .fail(function(){
            alert(id_articulo);
        });
 }
 $(function() {
   buscarFixtureXTorneo();
 });
 </script>
@endsection