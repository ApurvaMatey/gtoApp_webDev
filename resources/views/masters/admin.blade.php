@section('content')
<div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-right">
                        <a href="#modal-add-admin" class="modal-effect btn btn-az-primary" data-toggle="modal" data-effect="effect-scale">Add Admin</a>
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
                                        Admin List
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
                                                    <th class="wd-20p">Name</th>
                                                    <th class="wd-25p">Email</th>
                                                    <th class="wd-20p">Phone</th>
                                                    <th class="wd-15p">Added By</th>
                                                    <th class="wd-20p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($adminData)
                                                    @php 
                                                        $i = 1
                                                    @endphp
                                                    @foreach($adminData as $admin)
                                                    
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $admin['name'] }}</td>
                                                        <td>{{ $admin['email'] }}</td>
                                                        <td>{{ $admin['phone'] }}</td>
                                                        <td>
                                                            {{ $admin['addedBy'] }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-icon" onclick="editAdminModal({{ $admin['adminId'] }})"><i class="typcn typcn-edit"></i></button><br/>
                                                            <button class="btn btn-danger btn-icon" onclick="deleteAdminModal({{ $admin['adminId'] }})"><i class="typcn typcn-trash"></i></button>
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

<!-- Add Admin Modal -->
<div class="modal" id="modal-add-admin">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('addAdmin') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Add Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name: <span class="tx-danger">*</span></label>
                                <input type="text" name="admin_name" class="form-control" placeholder="Enter your name" required>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email: <span class="tx-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Number: <span class="tx-danger">*</span></label>
                            <input type="text" name="number" class="form-control" placeholder="Enter your number" required>
                        </div><!-- form-group -->
                        <div class="col-md-6">
                            <label class="form-label">Password: <span class="tx-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div><!-- form-group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-indigo">Add</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Edit Admin Modal -->
<div class="modal" id="modal-edit-admin">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{ url('editAdmin') }}" role="form" novalidate="novalidate" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title">Edit Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Admin ID: <span class="tx-danger">*</span></label>
                                <input type="text" name="edit-admin-id" id="edit-admin-id" class="form-control" placeholder="Admin ID" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name: <span class="tx-danger">*</span></label>
                                <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Enter your name" required>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email: <span class="tx-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div><!-- form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Number: <span class="tx-danger">*</span></label>
                            <input type="text" name="number" id="number" class="form-control" placeholder="Enter your number" required>
                        </div><!-- form-group -->
                        <div class="col-md-6">
                            <label class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div><!-- form-group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-indigo">Update</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Delete Admin Modal -->
<div class="modal" id="modal-delete-admin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form method="post" action="{{ url('deleteAdmin') }}" role="form" novalidate="novalidate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span style="font-size: 48px;" class="text-danger">&#9888;</span>
                    <h4 class="tx-danger mg-b-20">Do you want to delete this Admin !</h4>
                    <input class="text d-none" id="del-admin-id" name="del-admin-id" value="">
                    <button type="submit" class="btn btn-danger pd-x-25" aria-label="Close">Delete</button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection

@extends('scripts.admin_script')
@extends('layouts.app')