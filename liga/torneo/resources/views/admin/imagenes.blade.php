        @extends('admin.masterAdmin')

        @section('title')
        <h1>Gestion De imagenes<small >Imagen: {{$slider->TipoImagen->descripcion}} - {{$slider->titulo}} </small></h1>
        @endsection

        @section('breadcrumb')
        <li><a href="/admin/home"><i class="fa fa-home"></i> Home</a></li>
               <li><a href="/admin/imagenes"><i class="fa fa-picture-o"></i>Gestion Imagenes</a></li>
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
                <div class="panel panel-default">
                    <div class="panel-heading">Imagen</div>
                    <div class="panel-body">
                    @if($slider->imagen!=null)
                        <div class="col-md-12">
                            <a class="thumbnail" ><img src="/imagenes/{{$slider->imagen}}" ></a>
                        </div>
                        <div class="col-md-12">
                              <a href="#" data-toggle="modal" data-target="#modalFotoEliminar" class="btn btn-danger"><i class="fa fa-close"></i>Borrar Foto</a>
                        </div>
                    @else
                        <div class="col-md-12">
                            <form method="POST" action="imagenguardar" class="dropzone" id="upload" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $slider->idimagen }}" name="idimagen">
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

        <div class="modal fade" id="modalFotoEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Eliminando la imagen</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>¿Desea Eliminar La imagen?</h3>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    {!!Form::open(['url'=>'admin/imagenes/imagenborrar','method'=>'POST'])!!}
                                     {!!Form::Text('idimagen',$slider->idimagen,['class'=>'hidden'])!!}
                                     {!!Form::submit('Borrar Foto', array('class' => 'btn btn-success'))!!}
                                     {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        @endsection
        @section('script')
        <script src="/js/dropzone.js" type="text/javascript"></script>
        <script>
                $(function () {
                    Dropzone.options.upload = {
                         paramName : 'file',
                         uploadMultiple : false,
                         maxFiles:1,
                         acceptedFiles: ".jpg, .gif, .png, .bmp, .jpeg"

                     };
                });
                </script>
        @endsection
