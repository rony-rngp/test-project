
@if(Request::path() == '/')
    <div class="col-12 col-lg-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center px-xl-3">
                    <button class="btn btn-success btn-block" type="button" data-toggle="modal" onclick="showForm()" id="newUser">New User</button>
                </div>
                <hr class="my-3">
                <div class="e-navlist e-navlist--active-bold">
                    <ul class="nav">
                        <li class="nav-item active"><a href="" class="nav-link"><span>All User</span>&nbsp;<small>/&nbsp;{{ $count_users }}</small></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><span>Active</span>&nbsp;<small>/&nbsp;{{ $active_users }}</small></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><span>Inactive</span>&nbsp;<small>/&nbsp;{{ $inactive_users }}</small></a></li>
                    </ul>
                </div>
                <hr class="my-3">
                <form action="{{ route('search') }}" method="get">
                    <div>
                        <div class="form-group">
                            <label>Date from - to:</label>
                            <div>

                                <input type="text" id="Txt_Date" class="form-control" readonly name="date" placeholder="Choose Date" style="cursor: pointer;">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Search by Username:</label>
                            <div><input class="form-control w-100" type="text" name="name" placeholder="Name" ></div>
                        </div>
                    </div>

                    <hr class="my-3">
                    <div class="text-center px-xl-3">
                        <button class="btn btn-primary btn-block" type="submit" >Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if(Request::is('profile/*'))
    <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="px-xl-3">
                    <button onclick="alert('Sorry ! Auth feature not available')" class="btn btn-block btn-secondary" >
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

