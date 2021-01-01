@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row row-lg">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Administración</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $adminCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Becas</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $scholarshipCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Cultura</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $cultureCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Seguridad</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $emergencyCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
            </div>
        </div>
    </div>
</div>
@endsection

@extends('scripts.home_script')
@extends('layouts.app')