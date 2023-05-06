<div class="dashboard-content px-3 pt-4">
        <h2 class=""> <strong>
        @if (Auth::check())
            Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}!
        @endif
        </strong> ({{ Auth::user()->roles->pluck('name')->implode(', ') }})</h2>
        <p class="text-muted">This is the official dashboard of AJAB Transport Services Website, located in Danglag, Consolacion, Cebu.<br>
          This System is owned by: Mr. Angelo Rosales Balili
        </p>
      
      <div class="dashboard-row pt-2 d-flex " id="dashboard-row">
      
      <div class="db-group">
        <div class="dashboard-card-wrapper d-flex" style="background: #003049;">
          <a href="/allusers" class="text-decoration-none w-100">
            <div class="dashboard-card">
              <div class="db-col-1">
                <h5 class="card-count">{{ $numberOfUsers }}</h5>
                <p class="card-title">Clients</p>
              </div>
              <div class="db-col-1">
                <i class="fas fa-user fa-3x"></i>
              </div>
            </div>
          </a>
        </div>

        <div class="dashboard-card-wrapper d-flex" style="background: #d62828;">
          <a href="/available" class="text-decoration-none w-100">
            <div class="dashboard-card">
              <div class="db-col-1">
                <h5 class="card-count">{{ $available }}</h5>
                <p class="card-title">Available Cars</p>
              </div>
              <div class="db-col-1">
                <i class="fas fa-car-building fa-3x"></i>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="db-group">
        <div class="dashboard-card-wrapper d-flex" style="background: #f77f00;">
          <a href="/rented" class="text-decoration-none w-100">
            <div class="dashboard-card">
              <div class="db-col-1">
                <h5 class="card-count">{{ $rented }}</h5>
                <p class="card-title">Rented Cars</p>
              </div>
              <div class="db-col-1">
                <i class="fas fa-car fa-3x"></i>
              </div>
            </div>
          </a>
        </div>

        <div class="dashboard-card-wrapper d-flex" style="background: #fcbf49;">
          <a href="/bookings" class="text-decoration-none w-100">
            <div class="dashboard-card">
              <div class="db-col-1">
                <h5 class="card-count">{{ $numberOfBookings }}</h5>
                <p class="card-title">Bookings</p>
              </div>
              <div class="db-col-1">
                <i class="fas fa-book fa-3x"></i>
              </div>
            </div>
          </a>
        </div>
      </div>

      </div>

      <hr class="hr-2 mt-3">


    <div class="pt-2 d-flex justify-content-between db-bottom-row" >

    <div class="db-bottom-col1" >
    <div class="bg-light db-chart px-3 py-3" style=" border-radius: 10px; ">
    <h5><strong>User Report</strong></h5>
    <canvas id="dashboard-Chart"></canvas>
    </div>
    </div>

    <div class="db-bottom-col2" >
      <table class="table table-hover align-middle mb-0 bg-light">
        <thead class="bg-light ">
          <tr>
            <th scope="col" class="newclients-title">New Clients</th>
            <th scope="col"></th>
          </tr>
        </thead>
            <tbody>
            @if(count($allusers) > 0)
            @foreach($allusers->reverse() as $item)
              <tr>

                <td>
                  <div class ="d-flex align-items-center">

                  @if($item->profile_picture)
                      @if(file_exists(public_path('images/profile_picture/'.$item->profile_picture)))
                          <img src="{{ asset('images/profile_picture/' . $item->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                      @else
                          <img src="{{ $item->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                      @endif
                  @else
                      <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
                  @endif

                    <div class="ms-3 ">
                        <p class="fw-bold mb-1">{{ $item->first_name}} {{ $item->last_name}}</p>
                        <p class="text-muted mb-0">{{ $item->email}}</p>

                    </div>
                  </div>

                </td>

                <td style="text-align: right">
                  <p class="fst-italic text-muted my-0" >Member Since:</p>
                  <p class="fst-italic text-muted my-0" >{{ $item->created_at->format('M j, Y h:i A')}}</p>
                </td>

              </tr>
              @endforeach
              @else
              <tr class="no-data">
                <td colspan="2" class="text-center">No new user for the last 24hrs</td>
              </tr>
              @endif
            </tbody>
      </table>
    </div>

    

      </div>
      
      </div>