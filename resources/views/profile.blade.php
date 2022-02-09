@extends('layouts.app')

@section('title', 'Profile')

@push('css')

@endpush

@section('content')

    <div class="col mb-3">
        <div class="card">
            <div class="card-body">
                <div class="e-profile">
                    <div class="row">
                        <div class="col-12 col-sm-auto mb-3">
                            <div class="mx-auto" style="width: 140px;">
                                @if($user->image != null && file_exists(public_path('user/'.$user->image)))
                                <img src="{{ url('user/'.$user->image) }}">
                                @else
                                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                        <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->full_name }}</h4>
                                <p class="mb-0">@ {{ $user->user_name }}</p>
                                <div class="text-muted"><p></p></div>
                                <div class="mt-2">
                                    <form action="{{ route('update.image', $user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span><input type="file" name="image" accept=""></span>
                                        </button>
                                        <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}<br></span>
                                        <button type="submit"  class="btn btn-sm btn-success mt-2">Update Image</button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center text-sm-right">
                                <span class="badge badge-secondary">administrator</span>
                                <div class="text-muted"><small>Joined {{ date('Y-m-d', strtotime($user->created_at)) }}</small></div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="" class="active nav-link">Profile Info</a></li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input class="form-control" type="text" readonly value="{{ $user->full_name }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" type="text" readonly value="{{ $user->user_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" readonly value="{{$user->email}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>About</label>
                                                    <textarea class="form-control" rows="5" readonly placeholder="My Bio">{{ $user->about }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12  mb-3">
                                        <div class="mb-2 text-center"><b>Change Password</b></div><br>
                                        <form action="{{ route('user.password.update', $user->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <input class="form-control" name="current_password" type="password" placeholder="Current Password">
                                                        <span class="text-danger">{{ $errors->has('current_password') ? $errors->first('current_password') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input class="form-control" type="password" name="password" placeholder="New Password">
                                                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Confirm <span class="d-none d-xl-inline">Confirm Password</span></label>
                                                        <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password"></div>
                                                    <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary" style="float: right"type="submit">Update Password</button>
                                        </form>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
