
<section class="all-inquiry-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">All Inquiries</h5>
    </div>

<div class="table-responsive px-3 pb-3">

<table class="table mb-0 bg-light table-hover" id="dbTable">
<thead class="table table-dark">
<tr>
  <th scope="col" class="col-sm-2">Inquirer</th>
  <th scope="col">Phone</th>
  <th scope="col">Subject</th>
  <th scope="col" class="col-6">Content</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($inquiry as $item)
 <tr>
  <td>
    <div class ="d-flex align-items-center">
    <div class="">
        <p class="fw-bold mb-1">{{ $item->name}}</p>
        <p class="text-muted mb-0">{{ $item->email}}</p>
    </div>
    </div>

  </td> 

  <td>{{ $item->phone}}</td>
  
  <td>{{ $item->subject}}</td>
  <td>{{ $item->content}}</td>
  <td>
  <a href="#" title="View" class="actions action-view" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="/delete_inquiry/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>
  @endforeach


</tbody>
</table>





</div>




</section>




<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Inquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;">
          <thead class="table" style="background: #023047; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 50%;">Inquiry Details</th>
            <th style="padding: 10px; text-align: left; width: 50%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Full Name</td>
              <td style="padding: 10px;"><span id="name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Phone</td>
              <td style="padding: 10px;"><span id="phone"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Email</td>
              <td style="padding: 10px;"><span id="email"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Subject</td>
              <td style="padding: 10px;"><span id="subject"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Message</td>
              <td style="padding: 10px;"><span id="content"></span></td>
            </tr>
          </tbody>
        </table>

        <span><strong>Created at:</strong> <span id="date"></span></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>