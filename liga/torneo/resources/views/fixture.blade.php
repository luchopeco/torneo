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
                        @foreach($listTorneos[0]->ListFechas as $fecha)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="services-wrapper text-center" style="min-height: 300px">
                                    <h2>{{$fecha->numero_fecha}}</h2>
                                    @foreach($fecha->ListPartidos as $partido)
                                    <div class="row">
                                        <div class="col-xs-5">
                                            {{$partido->EquipoLocal->nombre_equipo}}
                                        </div>
                                        <div class="col-xs-2" style=" background-color: #000000">
                                            {{$partido->goles_local}} - {{$partido->goles_visitante}}
                                        </div>
                                        <div class="col-xs-5">
                                            {{$partido->EquipoVisitante->nombre_equipo}}
                                        </div>
                                    </div>
                                    <hr>
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