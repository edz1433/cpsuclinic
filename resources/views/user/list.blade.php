@extends('layout.master_layout')

@section('body')

@php $cr = request()->route()->getName(); @endphp

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @php $no = 1; @endphp
                                @foreach($user as $data)
                                <tr id="tr-{{ $data->id }}" class="{{ $cr === 'userEdit' ? $data->id == $selectedUser->id ? 'bg-selectEdit' : '' : ''}}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ ucfirst($data->lname) }} {{ ucfirst($data->fname) }} {{ ucfirst($data->mname) }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>
                                        <a href="{{ route('userEdit', $data->id) }}" class="btn btn-info btn-xs btn-edit" data-id="{{ $data->id }}">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </a>
                                        <button class="btn btn-danger btn-xs user-delete" data-id="{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-{{ $cr == 'userEdit' ? 'pen' : 'plus'}}"></i> {{ $cr == 'userEdit' ? 'Edit' : 'Add'}}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ $cr == 'userEdit' ? route('userUpdate', ['id' => $selectedUser->id]) : route('userCreate') }}" class="form-horizontal add-form-user" method="POST" id="addUser">
                        @csrf
                        @if ($cr == 'userEdit')
                            <input type="hidden" name="id" value="{{ $selectedUser->id }}">
                        @endif
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Last Name:</span>
                                    <input type="text" name="lname" value="{{ $cr === 'userEdit' ? $selectedUser->lname : '' }}" oninput="this.value = this.value.toUpperCase()" placeholder="Enter Last Name" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">First Name:</span>
                                    <input type="text" name="fname" value="{{ $cr === 'userEdit' ? $selectedUser->fname : '' }}" oninput="this.value = this.value.toUpperCase()" placeholder="Enter First Name" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Middle Name:</span>
                                    <input type="text" name="mname" value="{{ $cr === 'userEdit' ? $selectedUser->mname : '' }}" oninput="this.value = this.value.toUpperCase()" placeholder="Enter Middle Name" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Gender:</span>
                                    <select class="form-control form-control-sm select2bs4" name="gender">
                                        <option value=""> --- Select Here --- </option>
                                        <option @if($cr === 'Male' && $selectedUser->gender == 'Male' ? 'selected' : '' ) selected @endif>Male</option>
                                        <option @if($cr === 'userEdit' && $selectedUser->gender == 'Female' ? 'selected' : '' ) selected @endif>Female</option>
                                    </select>
                               </div>
                               <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Role:</span>
                                    <select class="form-control select_camp form-control-sm" name="role">
                                        <option value=""> --- Select Role --- </option>
                                        <option value="Administrator" @if($cr === 'userEdit' && $selectedUser->role == 'Administrator' ? 'selected' : '' ) selected @endif>Administrator</option>
                                        <option value="Staff" @if($cr === 'userEdit' && $selectedUser->role == 'Staff' ? 'selected' : '' ) selected @endif>Staff</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Username:</span>
                                    <input type="text" name="username" value="{{ $cr === 'userEdit' ? $selectedUser->username : '' }}" placeholder="Enter Username" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <span class="badge badge-secondary text-left" style="width: 70px; display: inline-block;">Password:</span>
                                    <input type="password" name="password" value="{{ $cr === 'userEdit' ? $selectedUser->password : '' }}" placeholder="Enter Password" class="form-control form-control-sm">   
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" name="btn-submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-save"></i> {{ $cr == 'userEdit' ? 'Update' : 'Save'}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection