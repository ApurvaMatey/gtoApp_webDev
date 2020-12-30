@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row row-lg">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Admin</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $adminCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Culture</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $cultureCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Emergency</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $emergencyCount }}</h6>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-dashboard-ten bg-purple">
                        <h6 class="az-content-label">Scholarship</h6>
                        <div class="card-body">
                            <div>
                                <h6>{{ $scholarshipCount }}</h6>
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