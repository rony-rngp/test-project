@extends('layouts.app')

@section('title', 'Search')

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
                                <th class="max-width">Email</th>
                                <th class="sortable">Date</th>
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
                                    <td class="text-nowrap align-middle">{{ $user->email }}</td>
                                    <td class="text-nowrap align-middle"><span>{{ date('Y-m-d', strtotime($user->created_at)) }}</span></td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group align-top">
                                            <a href="{{ route('profile', $user->id) }}" class="btn btn-sm btn-outline-secondary badge" type="button" >View</a>
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

                        @if(isset($_GET['search']) && !empty($_GET['search']))
                            {{ $users->appends(['search' => $_GET['search']])->links('pagination::bootstrap-4') }}

                        @elseif(isset($_GET['date']) && isset($_GET['name']) )
                            {{ $users->appends(['date' => $_GET['date'], 'name' => $_GET['name']])->links('pagination::bootstrap-4') }}
                        @endif
{{--                        {{ $users->links('pagination::bootstrap-4')}}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- toggle cdn -->


@endpush
