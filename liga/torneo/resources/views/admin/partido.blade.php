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
                    <div class=" panel-heading"><strong>Partido</strong> ({{$partido->EquipoLocal->nombre_equipo}} vs {{$partido->EquipoVisitante->nombre_equipo}})
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
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Local - {{$partido->EquipoLocal->nombre_equipo}}
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-7">
                                        {{$partido->EquipoLocal->nombre_equipo}}
                                    </div>
                                    <div class="col-xs-5">
                                        {!!Form::Text('goles_local',$partido->goles_local,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                         <table id="editar"  class=" table table-bordered table-condensed table-hover">
                                                <tr>
                                                    <th>Jugador</th>
                                                    <th>Goles favor</th>
                                                    <th>Goles en contra</th>
                                                    <th>Sancion</th>
                                                </tr>
                                                    @foreach($partido->EquipoLocal->ListJugadores as $jugador)
                                                <tr >
                                                     <td>{{$jugador->nombre_jugador}}</td>
                                                     <td>{!!Form::Text($jugador->idjugador.'GF',null,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}</td>
                                                     <td>{!!Form::Text($jugador->idjugador.'GC', null,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}</td>
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
                                Visitante - {{$partido->EquipoVisitante->nombre_equipo}}
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-7">
                                        {{$partido->EquipoVisitante->nombre_equipo}}
                                    </div>
                                    <div class="col-xs-5">
                                        {!!Form::Text('goles_visitante',$partido->goles_visitante,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                         <table id="editar"  class=" table table-bordered table-condensed table-hover">
                                                <tr>
                                                    <th>Jugador</th>
                                                    <th>Goles Favor</th>
                                                    <th>Goles en contra</th>
                                                    <th>Sancion</th>
                                                </tr>
                                                    @foreach($partido->EquipoVisitante->ListJugadores as $jugador)
                                                <tr >
                                                     <td>{{$jugador->nombre_jugador}}</td>
                                                     <td>{!!Form::Text( $jugador->idjugador, null,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}</td>
                                                     <td>{!!Form::Text( $jugador->idjugador, null,['class'=>' form-control','placeholder'=>'Goles','title'=>'Goles'])!!}</td>
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
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                {!!Form::submit('Guardar', array('class' => 'btn btn-success btn-block'))!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        @section('script')
        <script>


        </script>
        @endsection
