@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        Scholarship List
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
                                                    <th class="wd-20p">Title</th>
                                                    <th class="wd-25p">Description</th>
                                                    <th class="wd-20p">Image</th>
                                                    <th class="wd-20p">Link (url)</th>
                                                    <th class="wd-15p">Added By</th>
                                                    <th class="wd-20p">Action</th>
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
                                                            {{ $scholarship['addedBy'] }}
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

@extends('scripts.scholarship_script')
@extends('layouts.app')