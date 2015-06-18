@extends('app')
@section('title')
..::Tifosi::..
@endsection
@section('content')
<div class="margin-top">
<section id="login">
    <div >
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>LOGIN EQUIPOS</h3>
                    <hr />
                </div>
            </div>
            <div class="row animate-in" data-anim-type="fade-in-up">
                <div class=" col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
                    {!!Form::open(['url'=>'/loginequipo','method'=>'POST'])!!}
                    <div class="contact-wrapper text-center">
                        <h3>INICIAR SESION</h3>
                        <div class="row">
                            <div class="col-md-12">
                            NOMBRE DE USUARIO
                                {!!Form::Text('nombre',null,['class'=>' form-control','placeholder'=>'NOMBRE DE USUARIO '])!!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            Clave
                                {!!Form::Text('mail',null,['class'=>' form-control','placeholder'=>'CLAVE'])!!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12">
                                {!!Form::submit('INGRESAR', array('class' => 'btn btn-danger btn-block'))!!}
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</section>
</div>

@endsection
@section('script')

@endsection