        @extends('admin.masterAdmin')

        @section('title')
        <h1> Gestion De Equipos <small ></small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <div class=" col-md-12">
               <div class=" panel panel-default">
                    <div class=" panel-heading">Equipos <a href="" id="btnNuevoEquipo" title="Nuevo Equipo" class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalEquipoAgregar"><i class=" fa fa-plus"></i></a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>Desde Aqui Puede Agregar, editar o eliminar un Equipo</li>
                                    <li>Tambien Puede Agregar sus jugadores</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">
                        <table id="editar"  class=" table table-bordered table-condensed table-hover">
                            <tr>
                                <th>Equipo</th>
                            </tr>
                            @foreach($listEquipos as $equipo)
                                <tr >
                                    <td>{{$equipo->nombre_equipo}}</td>
                                    <td><a href="equipos/{{$equipo->idequipo}}"  class="btn btn-xs btn-primary " data-idequipo="{{$equipo->idequipo}}"  title="Editar Jugadores"> <i class="fa fa-user"></i></a></td>
                                    <td><a href="#"  class="btn btn-xs btn-info editar" data-idequipo="{{$equipo->idequipo}}"  title="Editar Nombre Equipo"> <i class=" fa fa-edit"></i></a></td>
                                    <td><a href="" class="btn btn-xs btn-danger eliminar" data-idequipo="{{$equipo->idequipo}}"  title="Eliminar"> <i class=" fa fa-close"></i></a></td>
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
                          {!!Form::open(['route'=>'admin.equipos.store','method'=>'POST', 'data-toggle='>'validator'])!!}
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title" id="myModalLabel">Agregando Equipo</h4>
                              </div>
                              <div class="modal-body"><div class=" panel panel-info">
                              <div class=" panel-heading">Equipo</div>
                                 <div class=" panel-body">
                                  <div clas="row">
                                      <div class="col-md-12">
                                            <div class="form-group">
                                                {!!Form::label('nombre','Nombre')!!}
                                                {!!Form::Text('nombre_equipo',null,['class'=>' form-control','required'])!!}
                                                <span class="help-block with-errors"></span>
                                            </div>

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
        <div class="modal fade" id="modalEquipoModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                      {!!Form::open(['route'=>'admin.equipos.update','method'=>'PUT', 'data-toggle='>'validator'])!!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Modificando Equipo</h4>
                        </div>
                        <div class="modal-body">
                                <div class=" panel panel-default">
                                <div class=" panel-heading">Equipo</div>
                                     <div class=" panel-body">
                                         <div class="row">
                                              <div class="col-md-12">
                                                    <div class="form-group">
                                                         {!!Form::Text('idequipo',null,['class'=>' hidden form-control','id'=>'idequipoU'])!!}
                                                         {!!Form::label('nombre','Nombre')!!}
                                                         {!!Form::Text('nombre_equipo',null,['class'=>' form-control','id'=>'nombre_equipoU','required'])!!}
                                                         <span class="help-block with-errors"></span>
                                                    </div>

                                              </div>
                                         </div>
                                     </div>
                                </div>
                        <div class="modal-footer">
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    {!!Form::submit('Modificar', array('class' => 'btn btn-success'))!!}
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
        <div class="modal fade" id="modalArbitroEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              {!!Form::open(['route'=>['admin.equipos.destroy'],'method'=>'DELETE'])!!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminando Arbitro</h4>
                                </div>
                                <div class="modal-body">
                                       <div class="row">
                                            <div class="col-md-12">
                                                {!!Form::Text('idequipo',null,['class'=>'hidden','id'=>'idequipoD'])!!}
                                                <h3>¿Desea Eliminar el Equipo?</h3>
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
                var id_articulo=$(this).attr('data-idequipo');
                $.ajax({
                     url:"equipos/buscar",
                     type: "POST",
                     dataType: "json",
                    data:{'idequipo': id_articulo}
                    })
                .done(function(response){
                        //alert(response.datos.titulo);
                        $('#nombre_equipoU').val(response.datos.nombre_equipo);
                        $('#idequipoU').val(response.datos.idequipo);
                        $("#modalEquipoModificar").modal("show");
                    })
                    .fail(function(){
                        alert(id_articulo);
                    });
            });
            $('body').on('click', '.eliminar', function (event) {
                event.preventDefault();
                var id_arbitro=$(this).attr('data-idequipo');
                $("#idequipoD").val(id_arbitro);
                $("#modalArbitroEliminar").modal("show");
            });

        });

        </script>
        @endsection
