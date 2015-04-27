        @extends('admin.masterAdmin')

        @section('title')
        <h1>Torneo: {{$fecha->Torneo->nombre_torneo}}/{{$fecha->Torneo->TipoTorneo->nombre_tipo_torneo}}/Fecha: {{$fecha->numero_fecha}}<small > </small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/torneos"><i class="fa fa-trophy"></i> Torneos</a></li>
        <li><a href="/admin/torneos/{{$fecha->Torneo->idtorneo}}"><i class="fa fa-trophy"></i>{{$fecha->Torneo->nombre_torneo}}</a></li>
        @endsection

        @section('content')
         @if(Session::has('mensajeOk'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{Session::get('mensajeOk')}}
                        </div>
                    </div>
                </div>
                </hr>
         @endif
        @if(Session::has('mensajeError'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               {{Session::get('mensajeError')}}
                        </div>
                    </div>
                </div>
                </hr>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class=" panel panel-default">
                    <div class=" panel-heading"><strong>Partidos</strong>  <a href="" id="btnNuevaFecha" title="Agregar Fechas"
                    class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalFechaAgregar"><i class=" fa fa-plus"></i></a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>Desde Aqui Puede Agregar o eliminar Fechas de un torneo</li>
                                     <li>En la columna es Play off ;"1" significa play off, "0" es fecha normal</li>
                                     <li>Las fechas Play Off NO SUMAN PUNTOS, SI computan goles</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">
                        <table id="editar"  class=" table table-bordered table-condensed table-hover">
                            <tr>
                                <th>Fecha</th>
                                 <th>Dia</th>
                                 <th>Observaciones</th>
                                  <th>Es Play Off</th>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
        <script>
        $(function () {
                $('body').on('click', '.editarfecha', function (event) {
                                event.preventDefault();
                                var id_articulo=$(this).attr('data-idfecha');
                                $.ajax({
                                     url:"../fechas/buscar",
                                     type: "POST",
                                     dataType: "json",
                                    data:{'idfecha': id_articulo}
                                    })
                                .done(function(response){
                                        //alert(response.datos.titulo);
                                        $('#numero_fechaU').val(response.datos.numero_fecha);
                                        $('#idfechaU').val(response.datos.idfecha);
                                        $('#fechaU').val(response.datos.fecha);
                                        $('#observacionesU').val(response.datos.observaciones);
                                        if(response.datos.es_play_off==1){
                                        $('#es_play_offU').prop('checked',true);
                                        }
                                        else{
                                        $('#es_play_offU').prop('checked',false);
                                        }
                                        $("#modalFechaModificar").modal("show");
                                    })
                                    .fail(function(){
                                        alert(id_articulo);
                                    });
                            });
            $('body').on('click', '.eliminar', function (event) {
                event.preventDefault();
                var id_equipo=$(this).attr('data-idequipo');
                $("#idequipoD").val(id_equipo);
                $("#modalEquipoEliminar").modal("show");
            });
             $('.datepicker').datepicker({
                 format: 'mm/dd/yyyy',
                 startDate: '-3d'
             })

        });

        </script>
        @endsection
