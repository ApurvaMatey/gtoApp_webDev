@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        Emergency Numbers List
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
                                                    <th class="wd-20p">Number</th>
                                                    <th class="wd-20p">Color Code</th>
                                                    <th class="wd-25p">Description</th>
                                                    <th class="wd-20p">Call Count</th>
                                                    <th class="wd-15p">Added By</th>
                                                    <th class="wd-20p">Action</th>
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
                                                        <td>{{ $emergency['description'] }}</td>
                                                        <td>{{ $emergency['callCount'] }}</td>
                                                        <td>
                                                            {{ $emergency['addedBy'] }}
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                    @php 
                                                        $i++ 
                                                    @endphp
                                                    @endforeach
                                                @else 
                                                    <tr>
                                                        <div>
                                                            No data found
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
@endsection

@extends('scripts.emergency_script')
@extends('layouts.app')