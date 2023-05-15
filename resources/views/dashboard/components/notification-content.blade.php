<section class="all-booking-section">


@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert">{{ session('status') }}</h6>
@endif

    
<div class="pb-2 d-flex justify-content-between px-3 pt-4">
  <h5 class="pb-2 title"><strong>All Notifications</strong></h5>
  </div>

  <div class="table-responsive px-3 pb-3">
  
<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
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
      <td>{{ $item->message}} ({{ $item->booking->form_type}})</td>
      <td>
        <div>
          <p class="fw-bold mb-1">{{ $item->car->brand }} {{ $item->car->model }} {{ $item->car->year }} </p>
          <p class="text mb-0">{{ $item->car->transmission}}</p>
        </div> 
      </td>
      <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y g:ia') }}</td>
      <td>
        @if(!$item->read_at)
          <form action="/mark_as_read_admin/{{ $item->id}}" method="POST" class="d-inline-block">
            @csrf
            @method('PUT')
            <input type="hidden" name="notification_id" value="{{ $item->id }}">
            <button type="submit" class="btn btn-success text-white" style="font-size: 10px;">
              <i class="fas fa-envelope-open-text"></i> Mark as Read
            </button>
          </form>
        @endif

  @can('can:delete-record')
    <a href="/delete_admin_notification/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
    @endcan

  </td>
  </tr>
  @endforeach




</tbody>
</table>
</div>
</section>