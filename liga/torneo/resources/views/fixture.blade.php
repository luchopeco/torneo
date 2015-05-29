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

     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

     <div class="fechas-wrapper  text-center col-fechas">{!!Form::select('idtorneo', $listTorneosCombo,null,array('class' => 'form-control'))!!}</div> </div>
            @foreach($listTorneos[0]->ListFechas as $fecha)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                       <!-- Segun si la fecha fue jugada o no cambio el color del borde-->
                        <?php $jugado=false;?>
                         @foreach($fecha->ListPartidos as $partido)
                         <?php $jugado= $partido->fue_jugado;?>
                         @endforeach
                            @if($jugado==true)
                                <div class="fechas-wrapper-jugado  text-center col-fechas" >
                            @else
                                <div class="fechas-wrapper  text-center col-fechas" >
                            @endif
                                <h2>{{$fecha->numero_fecha}}</h2>
                                @foreach($fecha->ListPartidos as $partido)
                                    <div class="row ">
                                        <div class="col-xs-5 text-right">
                                            {{$partido->EquipoLocal->nombre_equipo}}
                                            <div><small>{{date('d/m/Y', strtotime($fecha->fecha))}}</small></div>
                                        </div>
                                        <div class="col-xs-2 col-resultado" >
                                            @if($partido->goles_local==null)
                                                <div class="versus">VS</div>
                                            @else
                                                {{$partido->goles_local}} - {{$partido->goles_visitante}}
                                            @endif
                                        </div>
                                        <div class="col-xs-5 text-left">
                                            {{$partido->EquipoVisitante->nombre_equipo}}
                                            <div><small>{{$partido->hora}}</small></div>
                                        </div>
                                    </div>

                                     {{--<td>{{$partido->hora}}</td>--}}
                                     {{--<td>{{$partido->EquipoLocal->nombre_equipo}}</td>--}}
                                     {{--<td>{{$partido->EquipoVisitante->nombre_equipo}}</td>--}}
                                     {{--<td>{{$partido->goles_local}} - {{$partido->goles_visitante}}</td>--}}
                                     {{--<td>{{$partido->Arbitro->nombre}}</td>--}}

                                @endforeach
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
</section>
</div>
@endsection
@section('script')

@endsection