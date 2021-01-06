@section('content')
<!-- Change Password Page -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                            <form method="post" action="{{ url('changepasswordfunction') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nueva contraseña: <span class="tx-danger">*</span></label>
                                            <input id="password1" name="changePass" type="password" class="form-control password"
                                                placeholder="Por favor, entrar contraseña"
                                                data-parsley-minlength="4"
                                                data-parsley-errors-container=".errorspannewpassinput"
                                                data-parsley-required-message="Por favor, ingrese su nueva contraseña."
                                                data-parsley-uppercase="1"
                                                data-parsley-lowercase="1"
                                                data-parsley-number="1"
                                                data-parsley-special="1"
                                                data-parsley-required />
                                            <span class="errorspannewpassinput"></span>
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Confirmar contraseña: <span class="tx-danger">*</span></label>
                                            <input name="confirmPass" id="password2" type="password" class="form-control password"
                                                placeholder="Por favor, entrar confirmar contraseña"
                                                data-parsley-minlength="4"
                                                data-parsley-errors-container=".errorspanconfirmnewpassinput"
                                                data-parsley-required-message="Por favor, vuelva a ingresar su nueva contraseña."
                                                data-parsley-equalto="#password1"
                                                data-parsley-required />
                                            <span class="errorspanconfirmnewpassinput"></span>
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