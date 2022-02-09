@extends('layouts.app')

@section('title', 'Home')

@push('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="col mb-3">
        <div class="e-panel card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="mr-2"><span>Users</span><small class="px-1">Be a wise leader</small></h6>
                </div>
                <div class="e-table">
                    <div class="table-responsive table-lg mt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="align-top">
                                    <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                                        <input type="checkbox" class="custom-control-input" id="all-items">
                                        <label class="custom-control-label" for="all-items"></label>
                                    </div>
                                </th>
                                <th>Photo</th>
                                <th class="max-width">Name</th>
                                <th class="sortable">Date</th>
                                <th> Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td class="align-middle">
                                    <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                        <input type="checkbox" class="custom-control-input" id="item-1">
                                        <label class="custom-control-label" for="item-1"></label>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;">
                                        @if($user->image != null && file_exists(public_path('user/'.$user->image)))
                                            <img width="100%" src="{{ url('user/'.$user->image) }}">
                                        @else
                                            <i class="fa fa-fw fa-photo" style="opacity: 0.8;"></i>
                                        @endif

                                    </div>
                                </td>
                                <td class="text-nowrap align-middle">{{ $user->full_name }}</td>
                                <td class="text-nowrap align-middle"><span>{{ date('Y-m-d', strtotime($user->created_at)) }}</span></td>
                                <td class="text-center align-middle">
                                    <input type="checkbox" id="status" data-id="{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-size="sm">
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group align-top">
                                        <a href="{{ route('profile', $user->id) }}" class="btn btn-sm btn-outline-secondary badge" type="button" >View</a>
                                        <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" onclick="editUser({{$user->id}})" >Edit</button>
                                        <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-sm btn-outline-secondary badge" onclick="return confirm('Are you sure ?');" ><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data not found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                       {{ $users->links('pagination::bootstrap-4')}}
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- User Form Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span id="add">Create User</span>
                        <span id="edit">Edit User</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" action="javascript:void(0)" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="full_name">Full Name</label>
                                                <input class="form-control" id="full_name" type="text" name="name" placeholder="Name">
                                                <span class="text-danger" id="full_name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="user_name">Username</label>
                                                <input class="form-control" type="text" id="user_name" name="username" placeholder="Username">
                                                <span class="text-danger" id="user_name_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control" id="email" type="email" placeholder="email" name="email">
                                                <span class="text-danger" id="email_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="id" >

                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="form-group">
                                                <label for="about">About</label>
                                                <textarea class="form-control" id="about" rows="3" placeholder="My Bio" name="about"></textarea>
                                                <span class="text-danger" id="about_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="pwd">
                                <div class="col-12 mb-3">


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                                                <span class="text-danger" id="password_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm <span class="d-none d-xl-inline">Confirm Password</span></label>
                                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password"></div>
                                                <span class="text-danger" id="password_confirmation_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-primary" id="addBtn" onclick="addUser()" type="button">Add User</button>
                                    <button class="btn btn-primary" id="updateBtn" onclick="updateUser()" type="button">Update User</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- toggle cdn -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script type="text/javascript">
        $("#add").show();
        $("#addBtn").show();
        $('#edit').hide();
        $("#updateBtn").hide();

        //show user add form
        function showForm() {
            clearError();
            clearForm();
            $("#user-form-modal").modal('show');
        }

        //add user
        function addUser() {
            var full_name = $("#full_name").val();
            var user_name = $("#user_name").val();
            var email = $("#email").val();
            var about = $("#about").val();
            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val();

            $.ajax({
                url : "{{ route('user.store') }}",
                type : "post",
                data : {full_name:full_name, user_name:user_name, email:email, about:about, password:password, password_confirmation: password_confirmation, "_token": "{{ csrf_token() }}"},

                success: function(res){
                    if(res.status == true){
                        alert('User Successfully Added')
                        location.reload();
                    }
                },
                error: function(error){
                    clearError();
                    $("#full_name_error").text(error.responseJSON.errors.full_name);
                    $("#user_name_error").text(error.responseJSON.errors.user_name);
                    $("#email_error").text(error.responseJSON.errors.email);
                    $("#about_error").text(error.responseJSON.errors.about);
                    $("#password_error").text(error.responseJSON.errors.password);
                    $("#password_confirmation_error").text(error.responseJSON.errors.password_confirmation);
                }
            })
        }

        //edit user
        function editUser(id) {
            clearError();
            $.ajax({
                url : "{{ route('user.edit') }}",
                type : "GET",
                data : {id:id},
                success: function(data){

                    $("#user-form-modal").modal('show');

                    $("#add").hide();
                    $("#addBtn").hide();
                    $('#edit').show();
                    $("#updateBtn").show();
                    $("#pwd").hide();

                    $('#full_name').val(data.full_name);
                    $('#user_name').val(data.user_name);
                    $('#email').val(data.email);
                    $("#about").val(data.about);
                    $('#id').val(data.id);
                },
            });
        }

        //update user
        function updateUser() {
            var full_name = $("#full_name").val();
            var user_name = $("#user_name").val();
            var email = $("#email").val();
            var about = $("#about").val();
            var id = $("#id").val();

            $.ajax({
                url : "{{ route('user.update') }}",
                type : "post",
                data : {full_name:full_name, user_name:user_name, email:email, about:about, id:id, "_token": "{{ csrf_token() }}"},

                success: function(res){
                    if(res.status == true){
                        alert('User Successfully Updated')
                        location.reload();
                    }
                },
                error: function(error){
                    clearError();
                    $("#full_name_error").text(error.responseJSON.errors.full_name);
                    $("#user_name_error").text(error.responseJSON.errors.user_name);
                    $("#email_error").text(error.responseJSON.errors.email);
                    $("#about_error").text(error.responseJSON.errors.about);
                }
            })
        }

        //change status
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }


            $.ajax({
                url: "{{ route('user.status.update') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });

        //clear errors
        function clearError(){
            $('#full_name_error').text('');
            $('#user_name_error').text('');
            $('#email_error').text('');
            $("#about_error").text('');
            $("#password_error").text('');
            $("#password_confirmation_error").text('');
        }

        //clear form value
        function clearForm(){
            $('#full_name').val('');
            $('#user_name').val('');
            $('#email').val('');
            $("#about").val('');
            $("#password").val('');
            $("#password_confirmation").val('');
            $("#id").val('');
        }
    </script>

@endpush
