@extends('dashboard.layout.master')

@section('styles')
    @include('dashboard.assets.style')
@endsection

@section('content')

    <div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <img src="/images/LOGOwhite.png" class="sidebar-logo px-3 py-2" alt="Comapny Logo">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="far fa-stream"></i></button>
    </div>
    
    
    <ul class ="list-unstyled px-2 ">
      <li class=""><a href="/dashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home" style="margin-right: 10px;"></i>   Dashboard</a></li>
      <li class=""><a href="/all-vehicles" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list" style="margin-right: 10px;"></i>   Registered Vehicles</a></li>
      <li class=""><a href="/available" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-car" style="margin-right: 10px;"></i>   Available Cars</a></li>
      <li class=""><a href="/rented" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-car-building" style="margin-right: 10px;"></i>   Rented Cars</a></li>

      <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
      <span><i class="far fa-comment " style="margin-right: 10px;"></i>  Messages</span>
      <span class="bg-danger rounded-pill text-white px-2 py-0 d-flex align-items-center message-notif">02</span>
      </a>
      </li> -->
      @role(['Super-Admin', 'Admin'])
      <li class=""><a href="/add" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-cars" style="margin-right: 10px;"></i>   Add Car</a></li>
      @endrole
      <li class=""><a href="/allusers" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-users" style="margin-right: 10px;"></i>   Customers</a></li>
      <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-hand-holding-usd" style="margin-right: 10px;"></i>   Sales Report</a></li>
      <li class=""><a href="/bookings" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-book" style="margin-right: 13px;"></i>   Bookings</a></li>
      <li class=""><a href="/inquiry" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-question" style="margin-right: 17px;"></i>   Inquiry</a></li>
      <li class="active"><a href="/allratings" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-star" style="margin-right: 11px;"></i>   Ratings</a></li>
      @role(['Super-Admin', 'Admin'])
      <li class=""><a href="/user/management" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-user" style="margin-right: 17px;"></i>   User Management</a></li>
      @endrole
    </ul>

    <hr class="hr-1 mx-2">


    
    <ul class="list-unstyled px-2">

    <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars" style="margin-right: 10px;"></i>  Settings</a></li>

      <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
      <span><i class="fal fa-bell" style="margin-right: 10px;"></i>  Notification</span>
      <span class="bg-danger rounded-pill text-white px-2 py-0 d-flex align-items-center message-notif">02</span>
      </a>
      </li>
      
    </ul>

    <hr class="hr-1 mx-2">

    <ul class="list-unstyled px-2">

    <li class=""><a href="/adminlogout" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-sign-out" style="margin-right: 10px;"></i>  Log Out</a></li>
      
    </ul>

  </div> 
  
  <div class="content">
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <div class="d-flex justify-content-between d-md-none d-block">
    <a class="navbar-brand fs-4" href="#">AJAB</a>
    <button class="btn px-1 py-0 open-btn"><i class="far fa-stream"></i></button>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      

    <!-- <button type="button" class="btn position-relative nav-msg"><a href="#" class="text-decoration-none text-dark"><i class="fal fa-comment"></i>
      <span class="nav-msg-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        99+
        <span class="visually-hidden">unread messages</span>
      </span>
      </a>
      </button> -->
    

      <button type="button" class="btn position-relative nav-notif"><a href="/notification" class="text-decoration-none text-dark"><i class="fal fa-bell"></i>
      <span class="nav-notif-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        99+
        <span class="visually-hidden">unread notification</span>
      </span>
    </a>
      </button>

          <div class="dropdown">

            @if(Auth::user()->profile_picture)
                <img src="{{ asset('images/profile_picture/' . Auth::user()->profile_picture) }}" alt="" style="height: 35px; width: 35px; object-fit: cover; border: 0.5px solid #000;" class="rounded-circle">
            @else
                <img src="{{ asset('images/default-user.png') }}" alt="" style="height: 35px; width: 35px; object-fit: cover; border: 0.5px solid #000;" class="rounded-circle">
            @endif

            <button class="btn btn-link dropdown-toggle account-link text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::check())
            {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}
            @endif
            </button>
            
              <ul class="dropdown-menu dropdown-menu-lg-end account-dropdowns" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Account Settings</a></li>
                <li><a class="dropdown-item" href="/adminlogout">Log-out</a></li>
              </ul>
            </div>
        </li>
      </ul>
    </div>

  </div>
  </nav>
  <div id="dashboard-content">
  
    @include('dashboard.components.ratings-content')
</div>

  </div>
</div>
@endsection


@section('scripts')
    @include('dashboard.assets.script')
@endsection


@push('scripts')
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-ratings-db-view.js"></script>
@endpush