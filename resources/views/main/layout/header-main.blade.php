 
<header id="header">
     <nav>
     <div class="header-col-1 ">
        <a href="/mainhome" class="brand"><img src="/images/LOGO.png" class="logo"></a>
       
                <h2>|</h2>
                <div class="search-bar">
                    <form action="{{ route('car.search') }}" method="GET">
                        <i class="fas fa-search"></i>
                        <input name="search" type="search" class="" id="exampleFormControlInput1" placeholder="Search Rentals" style="outline: none" value="{{ $searchTerm ?? '' }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
    </div>

    <div class="header-col-2">
                <div>
                    <a href="#" id="mainside-bar" class="sidebar-toggle"><i class="fas fa-bars"></i></a>
                </div>
                <!-- <span>
                    <button type="button" class="icon-button">
                    <span><i class="fas fa-comment-alt-dots"></i></span>
                    <span class="icon-button__badge">2</span>
                    </button>
                </span> -->

                <!-- <span>
                    <button type="button" class="icon-button">
                    <span><i class="fas fa-shopping-cart"></i></span>
                    <span class="icon-button__badge">2</span>
                    </button>
                </span> -->

                <span>
                    <a href="/my_notification" type="button" class="icon-button" title="Notifications">
                    <span><i class="fas fa-bell"></i></span>
                    @if($notificationsUnread->count() > 0)
                    <span class="icon-button__badge">{{ $notificationsUnread->count() }}</span>
                    @endif
                    </a>
                </span>



                <span class="user-profile" onclick="menuToggle();">

                    @if(Auth::user()->profile_picture)
                    @if(file_exists(public_path('images/profile_picture/'.Auth::user()->profile_picture)))
                            <img src="{{ asset('/images/profile_picture/' .Auth::user()->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle" >
                        @else
                            <img src="{{ Auth::user()->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                        @endif
                    @else
                        <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                    @endif
                </span>
    </div>


    <div class="sub-menu-wrap">
        <div class="sub-menu">
            <div class="user-info">
                    <div><h5>            
                        @if (Auth::check())
                        {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}
                        @endif
                    </h5>
                    </div>
                    <div><span>                        
                        @if (Auth::check())
                        {{ Auth::user()->email }}
                        @endif
                    </span></div>
            </div>
            <hr>

        <div class="sub-menu-link-wrapper">
            <a href="/account" class="sub-menu-link">
                <span><img src="/images/profile/profile.png"></span>
                <span class="link">My Profile</span>
            </a>
            <a href="/my_bookings" class="sub-menu-link">
                <img src="/images/profile/setting.png">
                <span class="link">My Bookings</span>
            </a>

            <a href="/my_notification" class="sub-menu-link">
                <img src="/images/profile/setting.png">
                <span class="link">My Notifications</span>
            </a>

            <a href="/my_ratings" class="sub-menu-link">
                <img src="/images/profile/setting.png">
                <span class="link">My Ratings</span>
            </a>
            <a href="/logout" class="sub-menu-link">
                <img src="/images/profile/logout.png">
                <span class="link">Logout</span>
            </a>


            
        </div>



        </div>
    </div>


    </nav>
</header>



<div class="sidebar">
  <span class="close-btn" class="sidebar-toggle">&times;</span>

  <div class="user-profile">
    <div>
        <img src="/user.jpg" alt=""
        height="45" width="45" class="rounded-circle" id="change-img" style="object-fit: cover;">
    </div>
    <div class="pt-3 user-info">
        <div><span>                        
            @if (Auth::check())
            {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}
            @endif
        </span></div>
        <div><span>
            @if (Auth::check())
            {{ Auth::user()->email }} 
            @endif
        </span></div>
    </div>
 </div>

 <hr>
 <div class="search-bar">
    <form action="{{ route('car.search') }}" method="GET">
        <input name="search" type="search" class="" id="exampleFormControlInput1" placeholder="Search Rentals" style="outline: none" value="{{ $searchTerm ?? '' }}">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

  <div>
    <a href="/account">My Account</a>
    <a href="/my_bookings">My Bookings</a>
    <a href="/my_ratings">My Ratings</a>
    <a href="/my_notification">My Notifications</a>
    <a href="/logout">Logout</a>
  </div>

  <hr>

  <div>
    <a href="/mainhome">Home</a>
    <a href="/mainhome">All-Cars</a>
    <a href="/">Contact Us</a>
  </div>

  <hr>
    <div class="car-links-container">
        <a href="/mainhome" class="car-links">All-Cars</a>
        <a href="/van" class="car-links">Van</a>
        <a href="/sedan" class="car-links">Sedan</a>
        <a href="/pickup" class="car-links">Pick-Up</a>
        <a href="/7seaters" class="car-links">7-Seater</a>
        <a href="/hatchback" class="car-links">Hatchback</a>
    </div>
</div>
