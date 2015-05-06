        @extends('admin.masterAdmin')

        @section('title')
        <h1>Fecha: {{$fecha->numero_fecha}}<small> Torneo : {{$fecha->Torneo->nombre_torneo}} - {{$fecha->Torneo->TipoTorneo->nombre_tipo_torneo}}</small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/torneos"><i class="fa fa-trophy"></i> Torneos</a></li>
        <li><a href="/admin/torneos/{{$fecha->Torneo->idtorneo}}"><i class="fa fa-trophy"></i>{{$fecha->Torneo->nombre_torneo}}- {{$fecha->Torneo->TipoTorneo->nombre_tipo_torneo}}</a></li>
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
                <div class="panel panel-default">
                    <div class="panel-heading">Imagen de la fecha</div>
                    <div class="panel-body">
                    @if($fecha->imagen_fecha!=null)
                        <div class="col-md-12">
                            <img src="/imagenes/{{$fecha->imagen_fecha}}" class="thumbnail">
                        </div>
                        <div class="col-md-12">
                             {!!Form::open(['url'=>'admin/partidos/goles','method'=>'POST', 'data-toggle='>'validator'])!!}
                             {!!Form::Text('idfecha',$fecha->idfecha,['class'=>'hidden'])!!}
                             {!!Form::submit('Borrar Imagen', array('class' => 'btn btn-danger'))!!}
                             {!! Form::close() !!}
                        </div>
                    @else
                        <div class="col-md-12">
                            <form method="POST" action="../fecha/imagenguardar" class="dropzone" id="upload" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $fecha->idfecha }}" name="idfecha">
                                 <input type="hidden" value="{{ csrf_token() }}" name="file">
                                 <div class="dz-message">
                                     Arrastra y suelta aqui tu archivo. O simplemente haz click<br />
                                 </div>
                              </form>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>



        @endsection
        @section('script')
        <script src="/js/dropzone.js" type="text/javascript"></script>
        <script>
                $(function () {
                    Dropzone.options.upload = {
                         paramName : 'file',
                         uploadMultiple : false
                     };
                });
                </script>
        @endsection
