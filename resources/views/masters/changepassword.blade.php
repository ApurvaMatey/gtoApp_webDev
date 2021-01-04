@section('content')
<!-- Change Password Page -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            Cambia la contraseña
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ url('addCulture') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Entrar contraseña: <span class="tx-danger">*</span></label>
                                            <input type="password" name="changePass" class="form-control" placeholder="Por favor, entrar contraseña" required>
                                        </div><!-- form-group -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Confirmar contraseña: <span class="tx-danger">*</span></label>
                                            <input type="password" name="confirmPass" class="form-control" placeholder="Por favor, entrar confirmar contraseña" required>
                                        </div>
                                    </div><!-- form-group -->
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-indigo">Actualizar</button>
                                        <a type="button" href="{{ url('/home') }}" class="btn btn-outline-light">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')