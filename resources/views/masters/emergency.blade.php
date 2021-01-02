@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-right">
                        <a href="#modal-add-emergency" class="modal-effect btn btn-az-primary" data-toggle="modal" data-effect="effect-scale">Agregar seguridad</a>
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
                                        Lista de números de seguridad
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
                                                    <th class="wd-20p">Número</th>
                                                    <th class="wd-20p">Codigo de color</th>
                                                    <th class="wd-25p">Descripción</th>
                                                    <th class="wd-20p">Recuento de llamadas</th>
                                                    <th class="wd-15p">Añadido por</th>
                                                    <th class="wd-20p">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($emergencyData)
                                                    @php 
                                                        $i = 1
                                                    @endphp
                                                    @foreach($emergencyData as $emergency)
                                                    
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $emergency['number'] }}</td>
                                                        <td>{{ $emergency['colorCode'] }}</td>
                                                        <td>{!! $emergency['description'] !!}</td>
                                                        <td>{{ $emergency['callCount'] }}</td>
                                                        <td>
                                                            {{ $emergency['adminName'] }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-icon" onclick="editEmergencyModal({{ $emergency['emergencyId'] }})"><i class="typcn typcn-edit"></i></button><br/>
                                                            <button class="btn btn-danger btn-icon" onclick="deleteEmergencyModal({{ $emergency['emergencyId'] }})"><i class="typcn typcn-trash"></i></button>
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

<!-- Add Emergency Modal -->
<div class="modal" id="modal-add-emergency">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('addEmergency') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Agregar seguridad</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Número: <span class="tx-danger">*</span></label>
                                <input type="text" name="number" class="form-control" placeholder="Por favor ingrese el numero" required>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Codigo de color: <span class="tx-danger">*</span></label>
                                <input type="text" name="color_code" class="form-control" placeholder="Seleccionar código de color" required>
                                <!-- <div><input type="text" id="showAlpha"></div> -->
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <textarea class="ckeditor form-control" id="body" placeholder="Entrar descripción" name="description"></textarea>
                            </div><!-- form-group -->
                        </div>
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

<!-- Edit Emergency Modal -->
<div class="modal" id="modal-edit-emergency">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('editEmergency') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Editar seguridad</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Emergency ID: <span class="tx-danger">*</span></label>
                                <input type="text" name="edit-emergency-id" id="edit-emergency-id" class="form-control" placeholder="Emergency ID" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Número: <span class="tx-danger">*</span></label>
                                <input type="text" name="emergency_number" id="emergency_number" class="form-control" placeholder="Por favor ingrese el numero" required>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Codigo de color: <span class="tx-danger">*</span></label>
                                <input type="text" name="emergency_color_code" id="emergency_color_code" class="form-control" placeholder="Seleccionar código de color" required>
                                <!-- <div><input type="text" id="showAlpha"></div> -->
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Descripción: <span class="tx-danger">*</span></label>
                                <textarea class="ckeditor form-control" id="emergency_description" placeholder="Entrar descripción" name="emergency_description"></textarea>
                            </div><!-- form-group -->
                        </div>
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

<!-- Delete Emergency Modal -->
<div class="modal" id="modal-delete-emergency">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form method="post" action="{{ url('deleteEmergency') }}" role="form" novalidate="novalidate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span style="font-size: 48px;" class="text-danger">&#9888;</span>
                    <h4 class="tx-danger mg-b-20">¿Quieres eliminar esta seguridad?</h4>
                    <input class="text d-none" id="del-emergency-id" name="del-emergency-id" value="">
                    <button type="submit" class="btn btn-danger pd-x-25" aria-label="Close">Eliminar</button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection

@extends('scripts.emergency_script')
@extends('layouts.app')