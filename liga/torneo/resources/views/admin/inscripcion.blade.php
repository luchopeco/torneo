        @extends('admin.masterAdmin')

        @section('title')
        <h1> Gestion De Inscripciones<small ></small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/admin/home"><i class="fa fa-home"></i> Home</a></li>
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
                    <div class=" panel-heading">Peticiones de inscripción 
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>::Desde Aqui Puede inscribir un Equipo:</li>
                                   
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">
                        <div class="table-responsive">
                            <table id="editar"  class=" table table-bordered table-condensed table-hover">
                                <tr>
                                    <th>Nombre Equipo</th>
                                    <th>Nombre Delegado</th>
                                    <th>Teléfono</th>
                                   
                                    
                                </tr>
                                @foreach($listEquipos as $equipo)

                                <?php 

                                 // $delegado = Jugador::where('idequipo' , '=', $equipo->idequipo)->first();    // no me funciono esta linea

                                $delegado = DB::table('jugadores')
                                           ->select(DB::raw('*'))
                                           ->where('idequipo', '<>', $equipo->idequipo)                                           
                                           ->get();


                                  $nombreDelegado= "";
                                  $telefono="";
                                  if (!empty($delegado)) {
                                  //  $nombreDelegado=$delegado[0]['nombre_jugador'];
                                   // $telefono = $delegado[0]['telefono'];
                                  }
                                 ?>
                                    <tr >
                                        <td>{{$equipo->nombre_equipo}}</td>
                                        <th>{{$nombreDelegado}}</th>
                                        <th>{{$telefono}}</th>
                                      
                                        
                                        <td><a href="aceptarEquipo/{{$equipo->idequipo}}" title="ACEPTAR EQUIPO" class=" btn-xs btn btn-success" ><i class=" fa fa-plus"></i></a></td>
                                        <td><a href="eliminarInscripcion/{{$equipo->idequipo}}" class="btn btn-xs btn-danger eliminar" data-idequipo="{{$equipo->idequipo}}"  title="Eliminar"> <i class=" fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
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
                                                Es Libre
                                                 <div>{!!Form::checkbox('es_libre','0',false)!!}</div>
                                                 Observaciones
                                                 {!!Form::Textarea('observaciones',null,['class'=>' form-control'])!!}
                                                 Mensaje
                                                 {!!Form::Text('mensaje',null,['class'=>' form-control'])!!}
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
                                <div class=" panel-heading">Equipo
                                     <div class="pull-right">
                                            <div class="btn-group">
                                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                                </button>
                                                <ul class="multiselect-container dropdown-menu pull-right">
                                                    <li>Recuerde que el nombre de usuario no debe tener espacio en blancos ni caracteres especiales.</li>
                                                    <li>Tampoco se puede repetir es unico para cada equipo</li>
                                                     <li>Si no desea asignarle un nombre de usuario a un equipo dejelo en blanco</li>
                                                </ul>

                                            </div>
                                        </div>
                                </div>
                                     <div class=" panel-body">
                                         <div class="row">
                                              <div class="col-md-12">
                                                    <div class="form-group">
                                                         {!!Form::Text('idequipo',null,['class'=>' hidden form-control','id'=>'idequipoU'])!!}
                                                         {!!Form::label('nombre','Nombre')!!}
                                                         {!!Form::Text('nombre_equipo',null,['class'=>' form-control','id'=>'nombre_equipoU','required'])!!}
                                                         Es Libre
                                                         <div>{!!Form::checkbox('es_libre','0',false,['id'=>'es_libreU'])!!}</div>
                                                         Observaciones
                                                          {!!Form::Textarea('observaciones',null,['class'=>' form-control','id'=>'observacionesU'])!!}
                                                          Mensaje
                                                          {!!Form::Text('mensaje',null,['class'=>' form-control','id'=>'mensajeU'])!!}
                                                          Nombre Usuario
                                                          {!!Form::Text('nombre_usuario',null,['class'=>' form-control','id'=>'nombre_usuarioU'])!!}
                                                         <span class="help-block with-errors"></span>
                                                         Habilitar Autogestion
                                                         <div>{!!Form::checkbox('autogestion','0',false,['id'=>'autogestionU'])!!}</div>
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
                                                          <h4 class="modal-title" id="myModalLabel">Eliminando Equipo</h4>
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

        <div class="modal fade" id="modalCalveResetear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                      {!!Form::open(['url'=>['admin/equipos/resetearclave'],'method'=>'POST'])!!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Reseteando Clave</h4>
                        </div>
                        <div class="modal-body">
                               <div class="row">
                                    <div class="col-md-12">
                                        {!!Form::Text('idequipo',null,['class'=>'hidden','id'=>'idequipoC'])!!}
                                        <h3>¿Desea resetar la clave  del Equipo: <span id="equipoC"></span> </h3>
                                    </div>
                               </div>
                        <div class="modal-footer">
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    {!!Form::submit('Aceptar', array('class' => 'btn btn-success'))!!}
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
                        $('#mensajeU').val(response.datos.mensaje);
                        $('#observacionesU').val(response.datos.observaciones);
                        $('#nombre_usuarioU').val(response.datos.nombre_usuario);
                        if(response.datos.es_libre==1){
                        $('#es_libreU').prop('checked',true);
                        }
                        else{
                        $('#es_libreU').prop('checked',false);
                        }

                        if(response.datos.autogestion==1){
                        $('#autogestionU').prop('checked',true);
                        }
                        else{
                        $('#autogestionU').prop('checked',false);
                        }

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

            $('body').on('click', '.clave', function (event) {
                event.preventDefault();
                var id_equipo=$(this).attr('data-idequipo');
                var equipo=$(this).attr('data-equipo');
                $("#idequipoC").val(id_equipo);
                $("#equipoC").html(equipo);
                $("#modalCalveResetear").modal("show");
            });

        });

        </script>
        @endsection
