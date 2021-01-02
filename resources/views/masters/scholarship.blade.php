@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-right">
                        <a href="#modal-add-scholarship" class="modal-effect btn btn-az-primary" data-toggle="modal" data-effect="effect-scale">Agregar becas</a>
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
                                        Lista de becas
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
                                                @if($scholarshipData)
                                                    @php 
                                                        $i = 1
                                                    @endphp
                                                    @foreach($scholarshipData as $scholarship)
                                                    
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $scholarship['title'] }}</td>
                                                        <td>{{ $scholarship['description'] }}</td>
                                                        <td>{{ $scholarship['imagePath'] }}</td>
                                                        <td>{{ $scholarship['url'] }}</td>
                                                        <td>
                                                            {{ $scholarship['adminName'] }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-icon" onclick="editScholarshipModal({{ $scholarship['scholarshipId'] }})"><i class="typcn typcn-edit"></i></button><br/>
                                                            <button class="btn btn-danger btn-icon" onclick="deleteScholarshipModal({{ $scholarship['scholarshipId'] }})"><i class="typcn typcn-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    @php 
                                                        $i++ 
                                                    @endphp
                                                    @endforeach
                                                @else 
                                                    <tr>
                                                        <div>
                                                            Datos no encontrados
                                                        </div>
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

<!-- Add Scholarship Modal -->
<div class="modal" id="modal-add-scholarship">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('addScholarship') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Agregar becas</h6>
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
                            <label class="form-label">Imagen: </label>
                            <input type="file" name="imagePath" class="form-control" placeholder="Seleccione Imagen">
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

<!-- Edit Scholarship Modal -->
<div class="modal" id="modal-edit-scholarship">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('editScholarship') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Editar becas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Scholarship ID: <span class="tx-danger">*</span></label>
                                <input type="text" name="edit-scholarship-id" id="edit-scholarship-id" class="form-control" placeholder="Scholarship ID" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Título: <span class="tx-danger">*</span></label>
                                <input type="text" name="scholarship_title" id="scholarship_title" class="form-control" placeholder="Entrar cultura título" required>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <input type="text" name="scholarship_description" id="scholarship_description" class="form-control" placeholder="Entrar descripción" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Imagen: <span class="tx-danger">*</span></label>
                            <input type="file" name="scholarship_imagePath" id="scholarship_imagePath" class="form-control" placeholder="Seleccione Imagen" required>
                        </div><!-- form-group -->
                        <div class="col-md-6">
                            <label class="form-label">URL: <span class="tx-danger">*</span></label>
                            <input type="text" name="scholarship_url" id="scholarship_url" class="form-control" placeholder="Entrar url" required>
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

<!-- Delete Scholarship Modal -->
<div class="modal" id="modal-delete-scholarship">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form method="post" action="{{ url('deleteScholarship') }}" role="form" novalidate="novalidate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span style="font-size: 48px;" class="text-danger">&#9888;</span>
                    <h4 class="tx-danger mg-b-20">¿Quieres eliminar esta becas?</h4>
                    <input class="text d-none" id="del-scholarship-id" name="del-scholarship-id" value="">
                    <button type="submit" class="btn btn-danger pd-x-25" aria-label="Close">Eliminar</button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection

@extends('scripts.scholarship_script')
@extends('layouts.app')