 
<header id="header">
     <nav>
     <div class="header-col-1 ">
        <a href="/" class="brand"><img src="/images/LOGO.webp" class="logo"></a>
       
                <h2>|</h2>
                <div class="search-bar">
                    <form action="{{ route('car.home-search') }}" method="GET">
                        <i class="fas fa-search"></i>
                        <input name="search" type="search" class="" id="exampleFormControlInput1" placeholder="Search Rentals" style="outline: none" value="{{ $searchTerm ?? '' }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
    </div>

    <div class="header-col-2">
          <li> <a href="/sign-up">Sign up</a></li>
          <li> <a href="/log-in">Log in</a></li>
    </div>

    <div class="home-sidebar-div">
        <a href="#" id="home-side-bar-btn" class="home-sidebar-toggle"><i class="fas fa-bars"></i></a>
    </div>





    </nav>
</header>



<div class="home-sidebar">
  <span class="close-btn" class="home-sidebar-toggle">&times;</span>

 <div class="search-bar">
    <form action="{{ route('car.home-search') }}" method="GET">
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
    <a href="/">Home</a>
    <a href="/guest-home">All-Cars</a>
    <a href="/">Contact Us</a>
  </div>

  <hr>
    <div class="car-links-container">
        <a href="/guest-home" class="car-links">All-Cars</a>
        <a href="/guest-van" class="car-links">Van</a>
        <a href="/guest-sedan" class="car-links">Sedan</a>
        <a href="/guest-pickup" class="car-links">Pick-Up</a>
        <a href="/guest-7seaters" class="car-links">7-Seater</a>
        <a href="/guest-hatchback" class="car-links">Hatchback</a>
    </div>
</div>
