
<section class="all-vehicles-section">


<div class="table-responsive px-3 pt-4">

    <div class="pb-4 d-flex justify-content-between">
    <h5 class="">All Registered Vehicles</h5>
    <a href="/add" title="Add Car"><button class="btn btn-success rounded-pill"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
    </div>

    
<div class="allvehicles-table table-responsive  mb-4">
<table class="table align-middle mb-0 bg-light">
<thead class="table table-dark">
<tr>
  <th scope="col" class="col-3">Owner</th>
  <th scope="col">Vehicle Status</th>
  <th scope="col">Card Brand</th>
  <th scope="col">Car Model</th>
  <th scope="col">Plate No.</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($addcar as $item)
 <tr>
  <td>
    <div class ="d-flex align-items-center">
        <img src="user.jpg" alt=""
        style="height: 45px; width: 45px;" class="rounded-circle">
    <div class="ms-3">
        <p class="fw-bold mb-1">{{ $item->fname}} {{ $item->lname}}</p>
        <p class="text-muted mb-0">narbajajc@gmail.com</p>

    </div>
    </div>

  </td>
  <td>
    <span class="badge bg-danger rounded-pill">RENTED</span>
  </td>
  <td>{{ $item->brand}}</td>
  
  <td>{{ $item->model}}</td>
  <td>{{ $item->plate}}</td>
  <td>
  <a href="" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="" title="Edit" class="actions action-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  <a href="/delete_car/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>
  @endforeach


</tbody>
</table>
</div>




</div>




</section>