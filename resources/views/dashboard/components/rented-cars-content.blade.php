<section class="all-rented-section">
<div class="table-responsive px-3 pb-3" style="font-size: 14px;">
    
<h5 class="pt-4 pb-2"><strong>Rented Cars</strong></h5>
<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="font-size: 14px; width: 100%;">
<thead class="table table-dark" style="font-size: 14px;">
    <tr>
      <th scope="col">Renter</th>
      <th scope="col">Car Owner</th>
      <th scope="col">Car</th>
      <th scope="col">Plate No.</th>
      <th scope="col">Vehicle Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($rented as $item)
    @if ($item->status == 'Confirmed')
    <tr>
      <td>
        <div class ="d-flex align-items-center">
            <img src="user.jpg" alt=""
            style="height: 45px; width: 45px;" class="rounded-circle">
        <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->name }}</p>
            <p class="text-muted mb-0">{{ $item->con_email }}</p>

        </div>
        </div>

      </td>

      <td>
        <div class ="d-flex align-items-center">
            <img src="user.jpg" alt=""
            style="height: 45px; width: 45px;" class="rounded-circle">
        <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->car->fname }}</p>
            <p class="text-muted mb-0">{{ $item->car->email }}</p>

        </div>
        </div>

      </td>
      <td>{{ $item->car->brand }} {{ $item->car->model }} {{ $item->car->year }}</td>
      <td>{{ $item->car->plate }}</td>
      <td>
        <span class="badge bg-danger rounded-pill">Rented</span>
      </td>

      <td>
      <a href="" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
      </td>
      </tr>
    @endif
    @endforeach
  </tbody>
</table>
</div>
</section>