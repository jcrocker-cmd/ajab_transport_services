 
<header id="header">
     <nav>
     <div class="header-col-1 ">
        <a href="/" class="brand"><img src="/images/LOGO.png" class="logo"></a>
       
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

                <span>
                    <button type="button" class="icon-button">
                    <span><i class="fas fa-shopping-cart"></i></span>
                    <span class="icon-button__badge">2</span>
                    </button>
                </span>

                <span>
                    <button type="button" class="icon-button">
                    <span><i class="fas fa-bell"></i></span>
                    <span class="icon-button__badge">2</span>
                    </button>
                </span>

                <span class="user-profile" onclick="menuToggle();">
                    <img src="/user.jpg" alt=""
                    height="45" width="45" class="rounded-circle" id="change-img" style="object-fit: cover;">
                </span>
    </div>


    <div class="sub-menu-wrap">
        <div class="sub-menu">
            <div class="user-info">
                    <div><h5>{{ $data->first_name}} {{ $data->last_name}}</h5></div>
                    <div><span>{{ $data->email}}</span></div>
            </div>
            <hr>

        
        <a href="/account" class="sub-menu-link">
            <img src="/images/profile/profile.png">
            <p>My Profile</p>
        </a>
        <a href="#" class="sub-menu-link">
            <img src="/images/profile/setting.png">
            <p>My Settings</p>
        </a>
        <a href="/logout" class="sub-menu-link">
            <img src="/images/profile/logout.png">
            <p>Logout</p>
        </a>



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
        <div><span>{{ $data->first_name}} {{ $data->last_name}}</span></div>
        <div><span>{{ $data->email}}</span></div>
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
    <a href="#">Rental</a>
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
        <a href="/mainhome" class="car-links">Van</a>
        <a href="/mainhome" class="car-links">Sedan</a>
        <a href="/mainhome" class="car-links">Pick-Up</a>
        <a href="/mainhome" class="car-links">7-Seater</a>
        <a href="/mainhome" class="car-links">Hatchback</a>
    </div>
</div>
