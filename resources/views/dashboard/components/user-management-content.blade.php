@if (session('successregister'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('successregister') }}</h6>
@endif

@if (session('failregister'))
  <h6 class="alert alert-danger my-0" id="myAlert" style="font-size: 14px;">{{ session('failregister') }}</h6>
@endif

<section class="user-management px-3 py-4">

<h5 class=" pb-2 title"><strong>User Management</strong></h5>


<div class="user-management-row pt-2">

    <div class="user-col-1">

        <form action="/create-user-role" method="post">
            @csrf

            <div class="group d-flex">
                <div style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" onkeyup="javascript:capitalize(this);">
                </div>

                <div style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" id="exampleFormControlInput1" onkeyup="javascript:capitalize(this);">
                </div>

                <div style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" onkeyup="javascript:capitalize(this);">
                </div>
            </div>

            <div class="group d-flex">

                <div style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="">
                </div>

                <div style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" value="" onkeyup="javascript:capitalize(this);">
                </div>

                <div style="width: 100%;" class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Roles</label>
                    <select class="form-select" name="role" aria-label="Default select example" id="vehicle-info">
                        <option selected value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Front Desk</option>
                    </select>
                </div>

            </div>

            <div class="group">
            <button type="submit" class="btn btn-primary">
                Create User
            </button>
                </div>

        </form>
    </div>

    <hr>

    <div class="user-col-2">
        <div class="table-responsive" style="width: 100%;">

            <table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
            <thead class="table table-dark">
            <tr>
            <th scope="col">User</th>
            <th scope="col">Role</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($view_user as $view_user)
            <tr>
            <td>
                <div class ="d-flex align-items-center">
                @if($view_user->profile_picture)
                    <img src="{{ asset ('/images/profile_picture/' . $view_user->profile_picture) }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
                @else
                    <img src="{{ asset('/images/default-user.png') }}" alt="" style="height: 45px; width: 45px;" class="rounded-circle">
                @endif

{{-- 
                @if($view_user->profile_picture)
                  @if(file_exists(public_path('images/profile_picture/'.$view_user->profile_picture)))
                          <img src="{{ asset('/images/profile_picture/' . $view_user->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                      @else
                          <img src="{{ $view_user->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                      @endif
                  @else
                      <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                @endif --}}

                <div class="ms-3">
                    <p class="fw-bold mb-1">{{ $view_user->first_name }} {{ $view_user->middle_name }} {{ $view_user->last_name }} </p>
                    <p class="text-muted mb-0">{{ $view_user->email }}</p>
                </div>
                </div>

            </td> 

            <td>
            @foreach ($view_user->roles as $role)
            {{ $role->name }}
            @endforeach
            </td>
            
            <td>
            <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($view_user->created_at)->format('F d, Y')}}</p>
            </td>
            <td>
            <a href="#" title="View" class="actions action-view"  data-id="{{ $view_user->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="/delete_db_user/{{ $view_user->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

            </td>
            </tr>
            @endforeach


            </tbody>
            </table>


        </div>

    </div>
</div>


<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Enter your password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="password" class="form-control" id="passwordInput" placeholder="Password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="submitPasswordButton">Submit</button>
      </div>
    </div>
  </div>
</div>



<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dashboard Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;" id="modalTable">
          <thead class="table" style="background: #023047; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 50%;">Details</th>
            <th style="padding: 10px; text-align: left; width: 50%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Full Name</td>
              <td style="padding: 10px;"><span id="view_full_name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Phone</td>
              <td style="padding: 10px;"><span id="view_con_num"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Email</td>
              <td style="padding: 10px;"><span id="view_email"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Role</td>
              <td style="padding: 10px;"><span id="view_roles"></span></td>
            </tr>
          </tbody>
        </table>

        <div class="created_at"><strong>Created at:</strong> <span id="date"></span></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>