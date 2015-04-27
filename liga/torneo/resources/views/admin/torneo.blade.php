        @extends('admin.masterAdmin')

        @section('title')
        <h1>Torneo: {{$torneo->nombre_torneo}}/{{$torneo->TipoTorneo->nombre_tipo_torneo}}<small > </small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/torneos"><i class="fa fa-trophy"></i> Torneos</a></li>
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
            <div class="col-md-6">
                <div class=" panel panel-default">
                    <div class=" panel-heading"><strong>Fechas</strong>  <a href="" id="btnNuevaFecha" title="Agregar Fechas"
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
                                @foreach($torneo->ListFechas as $fecha)
                            <tr >
                                <td>{{$fecha->numero_fecha}}</td>
                                <td>{{date('d/m/Y', strtotime($fecha->fecha))}}</td>
                                <td>{{$fecha->observaciones}}</td>
                                <td>{{$fecha->esPlayOff()}}</td>
                                <td><a href="../fechas/{{$fecha->idfecha}}" class="btn btn-xs btn-primary " data-idtorneo="{{$fecha->idtorneo}}" data-idfecha="{{$fecha->idfecha}}"  title="Gestionar Partidos"> <i class="fa fa-futbol-o"></i></a></td>
                                <td><a href="" class="btn btn-xs btn-info editarfecha" data-idtorneo="{{$fecha->idtorneo}}" data-idfecha="{{$fecha->idfecha}}"  title="Editar"> <i class=" fa fa-edit"></i></a></td>
                                <td><a href="" class="btn btn-xs btn-danger eliminarfecha" data-idtorneo="{{$fecha->idtorneo}}" data-idfecha="{{$fecha->idfecha}}"  title="Eliminar"> <i class=" fa fa-close"></i></a></td>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class=" col-md-6">
               <div class=" panel panel-default">
                    <div class=" panel-heading"><strong>Equipos</strong> <a href="" id="btnNuevoEquipo" title="Agregar equipo al torneo" class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalEquipoAgregar"><i class=" fa fa-plus"></i></a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>Desde Aqui Puede Agregar o eliminar equipos a un torneo,</li>
                                    <li>Si desea Modificar el Equipo debe hacer desde la seccion equipo</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">
                        <table id="editar"  class=" table table-bordered table-condensed table-hover">
                            <tr>
                                <th>Equipos</th>
                            </tr>
                            @foreach($torneo->ListEquipos as $equipo)
                                <tr >
                                    <td>{{$equipo->nombre_equipo}}</td>
                                    <td><a href="" class="btn btn-xs btn-danger eliminar" data-idtorneo="{{$torneo->idtorneo}}" data-idequipo="{{$equipo->idequipo}}"  title="Eliminar"> <i class=" fa fa-close"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
               </div>
            </div>
        </div>


        <div class="modal fade" id="modalEquipoAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          {!!Form::open(['url'=>'admin/torneos/storeequipo','method'=>'POST'])!!}
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title" id="myModalLabel">Agregando Equipo</h4>
                              </div>
                              <div class="modal-body"><div class=" panel panel-info">
                              <div class=" panel-heading">Equipo</div>
                                 <div class=" panel-body">
                                  <div clas="row">
                                      <div class="col-md-12">
                                            {!!Form::Text('idtorneo',$torneo->idtorneo,['class'=>'hidden'])!!}
                                          {!!Form::select('idequipo', $listEquipos,null,array('class' => 'form-control'))!!}
                                      </div>
                                   </div>
                              </div>
                         </div></div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  {!!Form::submit('Aceptar', array('class' => 'btn btn-success'))!!}
                              </div>
                          {!! Form::close() !!}
                    </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modalEquipoEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              {!!Form::open(['url'=>['admin/torneos/destroyequipo'],'method'=>'POST'])!!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminando Equipo</h4>
                                </div>
                                <div class="modal-body">
                                       <div class="row">
                                            <div class="col-md-12">
                                                {!!Form::Text('idtorneo',$torneo->idtorneo,['class'=>'hidden'])!!}
                                                {!!Form::Text('idequipo',null,['class'=>'hidden','id'=>'idequipoD'])!!}
                                                <h3>¿Desea Eliminar el Equipo del Torneo?</h3>
                                                <div id="caca"></div>
                                            </div>
                                       </div>
                                <div class="modal-footer">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            {!!Form::submit('Eliminar', array('class' => 'btn btn-success'))!!}
                                        </div>
                                    </div>
                                </div>
                              {!! Form::close() !!}
                           </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                  </div>
                </div>

        <div class="modal fade" id="modalFechaAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                            <div class="modal-content">
                                  {!!Form::open(['route'=>'admin.fechas.store','method'=>'POST'])!!}
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title" id="myModalLabel">Agregando Fecha</h4>
                                      </div>
                                      <div class="modal-body"><div class=" panel panel-info">
                                      <div class=" panel-heading">Fecha</div>
                                         <div class=" panel-body">
                                          <div clas="row">
                                              <div class="col-md-12">
                                                    {!!Form::Text('idtorneo',$torneo->idtorneo,['class'=>'hidden'])!!}
                                                    Descripcion Fecha
                                                     {!!Form::Text('numero_fecha',null,['class'=>'form-control'])!!}
                                                    Dia
                                                    {!!Form::Text('fecha',null,['class'=>'form-control datepicker'])!!}
                                                    Observaciones
                                                    {!!Form::Text('observaciones',null,['class'=>'form-control'])!!}
                                                    Es Play Off
                                                    {!!Form::checkbox('es_play_off','0',false,['class'=>' form-control '])!!}
                                              </div>
                                           </div>
                                      </div>
                                 </div></div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          {!!Form::submit('Aceptar', array('class' => 'btn btn-success'))!!}
                                      </div>
                                  {!! Form::close() !!}
                            </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                </div>
        <div class="modal fade" id="modalFechaModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          {!!Form::open(['route'=>'admin.fechas.update','method'=>'PUT'])!!}
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  <h4 class="modal-title" id="myModalLabel">Modificando Fecha</h4>
                                              </div>
                                              <div class="modal-body"><div class=" panel panel-info">
                                              <div class=" panel-heading">Fecha</div>
                                                 <div class=" panel-body">
                                                  <div clas="row">
                                                      <div class="col-md-12">
                                                            {!!Form::Text('idfecha',null,['class'=>'form-control hidden','id'=>'idfechaU'])!!}
                                                            Descripcion Fecha
                                                             {!!Form::Text('numero_fecha',null,['class'=>'form-control','id'=>'numero_fechaU'])!!}
                                                            Dia
                                                            {!!Form::Text('fecha',null,['class'=>'form-control datepicker','id'=>'fechaU'])!!}
                                                            Observaciones
                                                            {!!Form::Text('observaciones',null,['class'=>'form-control','id'=>'observacionesU'])!!}
                                                            Es Play Off
                                                            {!!Form::checkbox('es_play_off','0',false,['class'=>' form-control','id'=>'es_play_offU'])!!}
                                                      </div>
                                                   </div>
                                              </div>
                                         </div></div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  {!!Form::submit('Aceptar', array('class' => 'btn btn-success'))!!}
                                              </div>
                                          {!! Form::close() !!}
                                    </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
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
