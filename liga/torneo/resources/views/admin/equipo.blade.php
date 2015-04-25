        @extends('admin.masterAdmin')

        @section('title')
        <h1>Equipo: {{$equipo->nombre_equipo}}<small > </small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/equipos"> <i class="fa fa-futbol-o"></i>Equipos</a></li>
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
                    <div class=" panel-heading"><strong>Jugadores</strong>  <a href="" id="btnNuevoJugador" title="Agregar Jugadores"
                    class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalJugadorAgregar"><i class=" fa fa-plus"></i></a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>Desde Aqui Puede Agregar modificar o eliminar los jugadores del equipo</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">
                        <table id="editar"  class=" table table-bordered table-condensed table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Observaciones</th>
                            </tr>
                                @foreach($equipo->ListJugadores as $jugador)
                            <tr >
                                <td>{{$jugador->nombre_jugador}}</td>
                                <td>{{$jugador->dni}}</td>
                                <td>{{$jugador->observaciones}}</td>
                                <td><a href="" class="btn btn-xs btn-info editar" data-idjugador="{{$jugador->idjugador}}" data-idequipo="{{$equipo->idequipo}}"  title="Modificar"> <i class=" fa fa-edit"></i></a></td>
                                <td><a href="" class="btn btn-xs btn-danger eliminar" data-idjugador="{{$jugador->idjugador}}" data-idequipo="{{$equipo->idequipo}}"  title="Eliminar"> <i class=" fa fa-close"></i></a></td>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalJugadorAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          {!!Form::open(['route'=>'admin.jugadores.store','method'=>'POST'])!!}
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title" id="myModalLabel">Agregando Jugador</h4>
                              </div>
                              <div class="modal-body"><div class=" panel panel-info">
                              <div class=" panel-heading">Jugador</div>
                                 <div class=" panel-body">
                                  <div clas="row">
                                      <div class="col-md-12">
                                            {!!Form::Text('idequipo',$equipo->idequipo,['class'=>'hidden'])!!}
                                            Nombre
                                            {!!Form::Text('nombre_jugador',null,['class'=>'form-control'])!!}
                                            Tipo y numero Documento
                                            {!!Form::Text('dni',null,['class'=>'form-control'])!!}
                                            Observaciones
                                            {!!Form::Text('observaciones',null,['class'=>'form-control'])!!}
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
        <div class="modal fade" id="modaljugadorModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                            <div class="modal-content">
                                  {!!Form::open(['route'=>'admin.jugadores.update','method'=>'PUT'])!!}
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title" id="myModalLabel">Modificando Jugador</h4>
                                      </div>
                                      <div class="modal-body"><div class=" panel panel-info">
                                      <div class=" panel-heading">Jugador</div>
                                         <div class=" panel-body">
                                          <div clas="row">
                                              <div class="col-md-12">
                                                    {!!Form::Text('idequipo',null,['class'=>'hidden','id'=>'idequipoU'])!!}
                                                    {!!Form::Text('idjugador',null,['class'=>'hidden','id'=>'idjugadorU'])!!}
                                                    Nombre
                                                    {!!Form::Text('nombre_jugador',null,['class'=>'form-control','id'=>'nombre_jugadorU'])!!}
                                                    Tipo y numero Documento
                                                    {!!Form::Text('dni',null,['class'=>'form-control','id'=>'dniU'])!!}
                                                    Observaciones
                                                    {!!Form::Text('observaciones',null,['class'=>'form-control','id'=>'observacionesU'])!!}
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
        <div class="modal fade" id="modalJugadorEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              {!!Form::open(['route'=>['admin.jugadores.destroy'],'method'=>'DELETE'])!!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminando Jugador</h4>
                                </div>
                                <div class="modal-body">
                                       <div class="row">
                                            <div class="col-md-12">
                                                {!!Form::Text('idequipo',null,['class'=>'hidden','id'=>'idequipoD'])!!}
                                                {!!Form::Text('idjugador',null,['class'=>'hidden','id'=>'idjugadorD'])!!}
                                                <h3>¿Desea Eliminar el Jugador del Equipo?</h3>
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

        @endsection
        @section('script')
        <script>
        $(function () {
        $('body').on('click', '.editar', function (event) {
                        event.preventDefault();
                        var id_articulo=$(this).attr('data-idjugador');
                        $.ajax({
                             url:"../jugadores/buscar",
                             type: "POST",
                             dataType: "json",
                            data:{'idjugador': id_articulo}
                            })
                        .done(function(response){
                                //alert(response.datos.titulo);
                                $('#nombre_jugadorU').val(response.datos.nombre_jugador);
                                $('#dniU').val(response.datos.dni);
                                $('#observacionesU').val(response.datos.observaciones);
                                $('#idequipoU').val(response.datos.idequipo);
                                $('#idjugadorU').val(response.datos.idjugador);
                                $("#modaljugadorModificar").modal("show");
                            })
                            .fail(function(){
                                alert(id_articulo);
                            });
                    });
            $('body').on('click', '.eliminar', function (event) {
                event.preventDefault();
                var id_jugador=$(this).attr('data-idjugador');
                var id_equipo=$(this).attr('data-idequipo');
                $("#idjugadorD").val(id_jugador);
                $("#idequipoD").val(id_equipo);
                $("#modalJugadorEliminar").modal("show");
            });

        });

        </script>
        @endsection
