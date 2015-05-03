        @extends('admin.masterAdmin')

        @section('title')
        <h1> Resultado <small> ({{$partido->EquipoLocal->nombre_equipo}} vs {{$partido->EquipoVisitante->nombre_equipo}}) - {{$partido->Torneo->nombre_torneo}} - {{$partido->Torneo->TipoTorneo->nombre_tipo_torneo}} - Fecha: {{$partido->Fecha->numero_fecha}}</small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/torneos"><i class="fa fa-trophy"></i> Torneos</a></li>
        <li><a href="/admin/torneos/{{$partido->Torneo->idtorneo}}"><i class="fa fa-trophy"></i>{{$partido->Torneo->nombre_torneo}}- {{$partido->Torneo->TipoTorneo->nombre_tipo_torneo}}</a></li>
        <li><a href="/admin/fechas/{{$partido->Fecha->idfecha}}"><i class="fa fa-calendar"></i>Fecha - {{$partido->Fecha->numero_fecha}}</a></li>
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
                    <div class=" panel-heading">
                        <strong>Partido</strong> ({{$partido->EquipoLocal->nombre_equipo}} vs {{$partido->EquipoVisitante->nombre_equipo}})
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="multiselect dropdown-toggle btn btn-xs btn-warning" data-toggle="dropdown" title="Ayuda">
                                    <i class="fa fa-question-circle"></i><b class="caret"></b>
                                </button>
                                <ul class="multiselect-container dropdown-menu pull-right">
                                    <li>Desde Aqui puede agregar, eliminar partidos y resultados de una fecha</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" panel-body">

                        <div class="row">
                            <div class="col-md-12">
                            {!!Form::open(['url'=>'admin/partidos/resultado','method'=>'POST'])!!}
                            {!!Form::Text('idpartido',$partido->idpartido,['class'=>' form-control hidden'])!!}
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        Resultado
                                        @if(Session::has('resultadoOk'))
                                            <span class="label label-success">Resultado Ok</span>
                                         @else
                                            <span class="label label-danger">Resultado No coincide con Goles</span>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Local - {{$partido->EquipoLocal->nombre_equipo}}
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!!Form::Text('goles_local',$partido->goles_local,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                 <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Visitante - {{$partido->EquipoVisitante->nombre_equipo}}
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                 {!!Form::Text('goles_visitante',$partido->goles_visitante,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-8">
                                                {!!Form::submit('Guardar', array('class' => 'btn btn-success btn-block'))!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       Goles - Local - {{$partido->EquipoLocal->nombre_equipo}}
                                       <a href="" id="btnNuevoGolLocal" title="Agregar Gol" class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalGolLocal"><i class=" fa fa-plus"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                 <table id="editar"  class=" table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <th>Jugador</th>
                                                            <th>Goles favor</th>
                                                            <th>Goles en contra</th>
                                                            <th>Sancion</th>
                                                        </tr>
                                                            @foreach($listGoleadoresLocal as $jugador)
                                                        <tr >
                                                             <td>{{$jugador->nombre_jugador}}</td>
                                                             <td>{{$jugador->goles_favor}}</td>
                                                             <td></td>
                                                             <td></td>
                                                        </tr>
                                                            @endforeach
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Goles - Visitante - {{$partido->EquipoVisitante->nombre_equipo}}
                                        <a href="" id="btnNuevoGolVisitante" title="Agregar Gol" class=" btn-xs btn btn-success" data-toggle="modal" data-target="#modalGolVisitante"><i class=" fa fa-plus"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                 <table id="editar"  class=" table table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <th>Jugador</th>
                                                            <th>Goles Favor</th>
                                                            <th>Goles en contra</th>
                                                            <th>Sancion</th>
                                                        </tr>
                                                            @foreach($listGoleadoresVisitante as $jugador)
                                                        <tr >
                                                             <td>{{$jugador->nombre_jugador}}</td>
                                                             <td>{{$jugador->goles_favor}}</td>
                                                             <td></td>
                                                             <td></td>
                                                        </tr>
                                                            @endforeach
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalGolLocal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          {!!Form::open(['url'=>'admin/partidos/goles','method'=>'POST'])!!}
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title" id="myModalLabel">Agregando Gol Local</h4>
                              </div>
                              <div class="modal-body"><div class=" panel panel-info">
                              <div class=" panel-heading">Jugador</div>
                                 <div class=" panel-body">
                                  <div clas="row">
                                      <div class="col-md-8">
                                            Jugador
                                            {!!Form::Text('idpartido',$partido->idpartido,['class'=>'hidden'])!!}
                                            {!!Form::select('idjugador', $listJugadoresLocales ,null,array('class' => 'form-control'))!!}
                                      </div>
                                      <div class="col-md-4">
                                       {!!Form::Text('goles_favor',null,['class'=>'form-control'])!!}
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
         <div class="modal fade" id="modalGolVisitante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          {!!Form::open(['url'=>'admin/partidos/goles','method'=>'POST'])!!}
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title" id="myModalLabel">Agregando Gol Visitante</h4>
                              </div>
                              <div class="modal-body"><div class=" panel panel-info">
                              <div class=" panel-heading">Jugador</div>
                                 <div class=" panel-body">
                                  <div clas="row">
                                      <div class="col-md-12">
                                            {!!Form::Text('idpartido',$partido->idpartido,['class'=>'hidden'])!!}
                                            {!!Form::select('idjugador', $listJugadoresVisitantes ,null,array('class' => 'form-control'))!!}
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


        </script>
        @endsection
