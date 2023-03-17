
<section class="all-vehicles-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-2 d-flex justify-content-between px-3 pt-4">
    <h5 class="">All Available Cars</h5>
    <a href="/add" title="Add Car"><button class="btn btn-success rounded-pill"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
    </div>

<div class="table-responsive px-3 pb-3" style="font-size: 14px;">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="font-size: 14px; width: 100%;">
<thead class="table table-dark" style="font-size: 14px;">
<tr>
  <th scope="col">Car</th>
  <th scope="col" class="">Owner</th>
  <th scope="col">Plate No.</th>
  <th scope="col">Vehicle Status</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($available as $item)
  @if ($item->status == 'Available' && $item->is_active == true)
 <tr>

  <td>

  <div class ="d-flex align-items-center">
      <img src="/images/uploads/{{ $item->carphoto }}" alt=""
      style="width: 45px;" class="">
    <div class="ms-3">
        <p class="fw-bold mb-1">{{ $item->brand }} {{ $item->model }} {{ $item->year }}</p>
        <p class="text-muted mb-0">{{ $item->transmission }}</p>

    </div>
  </div>

  </td>

  <td>
    <div class="">
        <p class="fw-bold mb-1">{{ $item->fname }} {{ $item->mname }} {{ $item->lname }}</p>
        <p class="text-muted mb-0">{{ $item->email }}</p>

    </div>

  </td>
  
  <td>{{ $item->plate }}</td>

  <td>
    <span class="badge bg-success rounded-pill">{{ $item->status }}</span>
  </td>

  <td>
  <a href="/viewcar/{{ $item->id }}" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  </td>
  </tr>
  @endif
  @endforeach


</tbody>
</table>





</div>




</section>