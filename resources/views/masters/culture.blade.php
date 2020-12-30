@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        Culture List
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
                                                @if($cultureData)
                                                    @php 
                                                        $i = 1
                                                    @endphp
                                                    @foreach($cultureData as $culture)
                                                    
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $culture['title'] }}</td>
                                                        <td>{{ $culture['description'] }}</td>
                                                        <td>{{ $culture['imagePath'] }}</td>
                                                        <td>{{ $culture['url'] }}</td>
                                                        <td>
                                                            {{ $culture['addedBy'] }}
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

@extends('scripts.culture_script')
@extends('layouts.app')