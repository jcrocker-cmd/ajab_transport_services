@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
    <link rel="stylesheet" href="/css/main-notif.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">

 @endsection

@section('content') 
    @include('main.layout.header-main')
    @include('main.layout.header2-main')

    <section class="all-notif-section">


@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert">{{ session('status') }}</h6>
@endif

    
<div class="pb-2 d-flex justify-content-between pt-4">
  <h5 class="pb-2 title"><strong>All Notifications</strong></h5>
  </div>

  <div class="table-responsive pb-3">
  
<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="clientTable" style="width: 100%;">
<thead class="bg-light">
<tr id="notif-head">
  <th scope="col">Person</th>
  <th scope="col">Message</th>
  <th scope="col">Car</th>
  <th scope="col">Created at</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($notification as $item)
    <tr class="{{ !$item->read_at ? 'bg-secondary text-white' : '' }}">
      <td>
        <div class="d-flex align-items-center">
          @if($item->user->profile_picture)
            @if(file_exists(public_path('images/profile_picture/'.$item->user->profile_picture)))
              <img src="{{ asset('/images/profile_picture/' . $item->user->profile_picture) }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
            @else
              <img src="{{ $item->user->profile_picture }}" alt="User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
            @endif
          @else
            <img src="{{ asset('/images/default-user.png') }}" alt="Default User Profile Picture" style="height: 45px; width: 45px; object-fit: cover;" class="rounded-circle">
          @endif
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->booking->name}}</p>
            <p class="text mb-0">{{ $item->booking->con_email}}</p>
          </div>
        </div>
      </td>
      <td>{{ $item->message}}</td>
      <td>
        <div>
          <p class="fw-bold mb-1">{{ $item->car->brand }} {{ $item->car->model }} {{ $item->car->year }} </p>
          <p class="text mb-0">{{ $item->car->transmission}}</p>
        </div> 
      </td>
      <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y g:ia') }}</td>
      <td>
        @if(!$item->read_at)
          <form action="/mark_as_read_user/{{ $item->id}}" method="POST" class="d-inline-block">
            @csrf
            @method('PUT')
            <input type="hidden" name="notification_id" value="{{ $item->id }}">
            <button type="submit" class="btn btn-success text-white" style="font-size: 10px;">
              <i class="fas fa-envelope-open-text"></i> Mark as Read
            </button>
          </form>
        @endif

    <a href="/delete_user_notification/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete text-dark"><i class="fa fa-trash" aria-hidden="true"></i></a>


  </td>
  </tr>
  @endforeach




</tbody>
</table>
</div>
</section>




@endsection

@section('script')
    @include('main.assets.bootstrapjs')
    @include('main.assets.script')
@endsection


@push('script')
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>


    <script src="/js/jquery.js"></script>
    

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>

    <script src="/data-table-client.js"></script>

    <!-- End -->
@endpush
