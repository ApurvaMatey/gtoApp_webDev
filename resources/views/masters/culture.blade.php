@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-right">
                        <a href="#modal-add-culture" class="modal-effect btn btn-az-primary" data-toggle="modal" data-effect="effect-scale">Agregar cultura</a>
                    </div>
                    <br/><br/><br/>

                    <!-- Alert Success Or Error On Functionality -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Well done!</strong> {{ session('success') }}
                        </div><!-- alert -->
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Oh snap!</strong> {{ session('error') }}
                        </div><!-- alert -->

                    @endif

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        Lista de cultura
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example2" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="wd-20p">#</th>
                                                    <th class="wd-20p">Título</th>
                                                    <th class="wd-25p">Descripción</th>
                                                    <th class="wd-20p">Imagen</th>
                                                    <th class="wd-20p">Enlace (url)</th>
                                                    <th class="wd-15p">Añadido por</th>
                                                    <th class="wd-20p">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($cultureData)
                                                    @php 
                                                        $i = 1
                                                    @endphp
                                                    @foreach($cultureData as $culture)
                                                    
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $culture['title'] }}</td>
                                                        <td>{!! $culture['description'] !!}</td>
                                                        <td>{{ $culture['imagePath'] }}</td>
                                                        <td>{{ $culture['url'] }}</td>
                                                        <td>
                                                            {{ $culture['adminName'] }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-icon" onclick="editCultureModal({{ $culture['cultureId'] }})"><i class="typcn typcn-edit"></i></button><br/>
                                                            <button class="btn btn-danger btn-icon" onclick="deleteCultureModal({{ $culture['cultureId'] }})"><i class="typcn typcn-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    @php 
                                                        $i++ 
                                                    @endphp
                                                    @endforeach
                                                @else 
                                                    <tr>
                                                        <td>
                                                            Datos no encontrados
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<!-- Add Culture Modal -->
<div class="modal" id="modal-add-culture">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('addCulture') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Agregar cultura</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Título: <span class="tx-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Entrar el título de la cultura" required>
                            </div><!-- form-group -->
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <input type="text" name="description" class="form-control" placeholder="Entrar descripción" required>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <textarea class="ckeditor form-control" id="body" placeholder="Entrar descripción" name="description" required></textarea>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Imagen: <span class="tx-danger">*</span></label>
                            <input type="file" name="imagePath" class="form-control" style="overflow-x: hidden" placeholder="Seleccione Imagen" onchange="readURL(this);" required>
                            <img class="d-none" id="display-img" src="#" alt="your image" width="100%" height="200px">
                        </div><!-- form-group -->
                        <div class="col-md-6">
                            <label class="form-label">URL: <span class="tx-danger">*</span></label>
                            <input type="text" name="url" class="form-control" placeholder="Entrar url" required>
                        </div><!-- form-group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-indigo">Añadir</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerca</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Edit Culture Modal -->
<div class="modal" id="modal-edit-culture">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('editCulture') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Editar cultura</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Culture ID: <span class="tx-danger">*</span></label>
                                <input type="text" name="edit-culture-id" id="edit-culture-id" class="form-control" placeholder="Culture ID" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Título: <span class="tx-danger">*</span></label>
                                <input type="text" name="culture_title" id="culture_title" class="form-control" placeholder="Entrar cultura título" required>
                            </div><!-- form-group -->
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <input type="text" name="culture_description" id="culture_description" class="form-control" placeholder="Entrar descripción" required>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <textarea class="ckeditor form-control" placeholder="Entrar descripción" name="culture_description" id="culture_description" required></textarea>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Imagen: </label>
                            <input type="file" name="culture_imagePath" style="overflow-x: hidden" id="culture_imagePath" class="form-control" placeholder="Seleccione Imagen" onchange="editReadURL(this);">
                            <img src="#" class="" id="edit-display-img" alt="your image" width="100%" height="200px">
                        </div><!-- form-group -->
                        <div class="col-md-6">
                            <label class="form-label">URL: <span class="tx-danger">*</span></label>
                            <input type="text" name="culture_url" id="culture_url" class="form-control" placeholder="Entrar url" required>
                        </div><!-- form-group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-indigo">Actualizar</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerca</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Delete Culture Modal -->
<div class="modal" id="modal-delete-culture">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form method="post" action="{{ url('deleteCulture') }}" role="form" novalidate="novalidate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span style="font-size: 48px;" class="text-danger">&#9888;</span>
                    <h4 class="tx-danger mg-b-20">¿Quieres eliminar esta cultura?</h4>
                    <input class="text d-none" id="del-culture-id" name="del-culture-id" value="">
                    <button type="submit" class="btn btn-danger pd-x-25" aria-label="Close">Eliminar</button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection

@extends('scripts.culture_script')
@extends('layouts.app')