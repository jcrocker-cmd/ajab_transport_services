<!-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    .card-body p
    {
        font-family: 'Poppins', sans-serif;
        src:url('https://fonts.googleapis.com/css2?family=Poppins&display=swap')

    }
</style> -->

<!-- <style type="text/css">
    body, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, img, ul, ol, li, table, tr, th, td {
      margin: 0;
      padding: 0;
      border: 0;
      font-size: 100%;
      font: inherit;
      vertical-align: baseline;
    }
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
    }
    th, td {
      text-align: left;
      vertical-align: middle;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
      padding: 8px;
    }
    td {
      padding: 8px;
      border-top: 1px solid #ccc;
    }
    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style> -->

  

   <div style="
            justfy-content: center;
            text-align: center;

            ">
    <img src="http://localhost:8000/images/LOGO.png" width="200px" alt="" srcset="">
    
    <h5 style="font-size: 30px;
                margin: 0;
                padding: 0;
                margin-top: 10px;
                margin-bottom: 15px;
                ">
                Daily Booking Form</h5>
  </div>

<div style="display: flex;
            justify-content: center;
            text-align: center;
            align-items: centeer
            width: 100%;
            ">

  <table class="table"  width="50%"  cellspacing="0" cellpadding="0" 
                              style="@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
                                      font-family: 'Arial', sans-serif;
                                      border: 1px solid #003049;
                                      max-width: 100%;
                                      ">
    <thead class="table-info"  style="background: #003049; 
                                      color: white;
                                      ">
      <tr>
      <th style="padding: 10px; text-align: left; width: 50%;">Renter Information</th>
      <th style="padding: 10px; text-align: left; width: 50%;"></th>
      </tr>
    </thead>
    <tbody>
      <tr style="border-bottom: 1px solid black;">
        <td style="padding: 10px;" >Full Name</td>
        <td style="padding: 10px;"> {!! $data['name'] !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Contact Email</td>
        <td style="padding: 10px;">{!! $data['con_email'] !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Contact Phone</td>
        <td style="padding: 10px;">{!! $data['con_num'] !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Address</td>
        <td style="padding: 10px;">{!! $data['address'] !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">License (Front Side)</td>
        <td style="padding: 10px;">@fat</td>
      </tr>
      <tr>
        <td style="padding: 10px;">License (Back Side)</td>
        <td style="padding: 10px;">@fat</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Message (Optional)</td>
        <td style="padding: 10px;">{!! $data['msg'] !!}</td>
      </tr>
    </tbody>

    <thead class="table-info"  style="background: #003049; 
                                      color: white;
                                      ">
      <tr>
        <th style="padding: 10px; text-align: left;" colspan="2">Car Details</th>
      </tr>
    </thead>
    <tbody>
      <tr style="border: 1px solid black;">
        <td style="padding: 10px;">Brand</td>
        <td style="padding: 10px;">{!! $data['car_details']->brand !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Model</td>
        <td style="padding: 10px;">{!! $data['car_details']->model !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Vehicle type</td>
        <td style="padding: 10px;">{!! $data['car_details']->vehicle !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Year Model</td>
        <td style="padding: 10px;">{!! $data['car_details']->year !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Transmission</td>
        <td style="padding: 10px;">{!! $data['car_details']->transmission !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Plate No.</td>
        <td style="padding: 10px;">http://127.0.0.1:8000/images/uploads/{!! $data['car_details']->carphoto !!}</td>
      </tr>
    </tbody>

    <thead class="table-info"  style="background: #003049; 
                                      color: white;
                                      ">
      <tr>
        <th style="padding: 10px; text-align: left;" colspan="2">Reservation Details</th>
      </tr>
    </thead>
    <tbody>
      <tr style="border: 1px solid black;">
        <td style="padding: 10px;">Start Date</td>
        <td style="padding: 10px;">{!! date('F j, Y', strtotime(date('Y-m-d', strtotime($data['start_date'])))) !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Start Time</td>
        <td style="padding: 10px;">{!! date('h:i A', strtotime($data['start_time'])) !!}</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="padding: 10px;">Return Date</td>
        <td style="padding: 10px;">{!! date('F j, Y', strtotime(date('Y-m-d', strtotime($data['return_date'])))) !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Return Time</td>
        <td style="padding: 10px;">{!! date('h:i A', strtotime($data['return_time'])) !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Mode of Delivery</td>
        <td style="padding: 10px;">{!! $data['mode_del'] !!}</td>
      </tr>
    </tbody>


    <thead class="table-info"  style="background: #003049; 
                                      color: white;
                                      ">
      <tr>
        <th style="padding: 10px; text-align: left;" colspan="2">Payment Details</th>
      </tr>
    </thead>
    <tbody>
      <tr style="border: 1px solid black;">
        <td style="padding: 10px;">Payment Method</td>
        <td style="padding: 10px;">{!! $data['payment'] !!}</td>
      </tr>
      <tr>
        <td style="padding: 10px;">Total Amount Payable</td>
        <td style="padding: 10px;">@fat</td>
      </tr>
    </tbody>

    

  </table>
</div>

<!-- <div style="display: flex;
            justify-content: center;
">
<table class="table"  width="50%"  cellspacing="0" cellpadding="0" 
                             style="@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
                                    font-family: 'Arial', sans-serif;
                                    border: 1px solid #003049;
                                    max-width: 100%;
                                    ">
  <thead class="table-info"  style="background: #003049; 
                                    color: white;
                                    ">
    <tr>
      <th style="padding: 10px; text-align: left; width: 50%;">Renter Information</th>
      <th style="padding: 10px; text-align: left; width: 50%;"></th>
    </tr>
  </thead>
  <tbody>
    <tr style="border-bottom: 1px solid black;">
      <td style="padding: 10px;" >Full Name</td>
      <td style="padding: 10px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">Contact Email</td>
      <td style="padding: 10px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">Contact Phone</td>
      <td style="padding: 10px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">Address</td>
      <td style="padding: 10px;"></td>
    </tr>
    <tr>
      <td style="padding: 10px;">License (Front Side)</td>
      <td style="padding: 10px;">@fat</td>
    </tr>
    <tr>
      <td style="padding: 10px;">License (Back Side)</td>
      <td style="padding: 10px;">@fat</td>
    </tr>
    <tr>
      <td style="padding: 10px;">Message (Optional)</td>
      <td style="padding: 10px;"></td>
    </tr>
  </tbody>

  

</table>

</div> -->