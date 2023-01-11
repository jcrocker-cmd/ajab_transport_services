<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    .card-body p
    {
        font-family: 'Poppins', sans-serif;
        src:url('https://fonts.googleapis.com/css2?family=Poppins&display=swap')
    }
</style>

<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">

                <div class="card-body">
                    <strong><h3>Booking Form</h3></strong>
                    <p>FullName: <strong>{!! $name !!}</strong></p>
                    <p>Contact Email: <strong>{!! $con_email !!}</strong></p>
                    <p>Contact Phone: <strong>{!! $con_num !!}</strong></p>
                    <p>Address: <strong>{!! $address !!}</strong></p>
                    <br>
                    <p>Start Date: <strong>{!! $start_date !!}</strong></p>
                    <p>Start Time: <strong>{!! $start_time !!}</strong></p>
                    <p>Return Date: <strong>{!! $return_date !!}</strong></p>
                    <p>Return Time: <strong>{!! $return_time !!}</strong></p>
                    <p>Mode of Delivery: <strong>{!! $mode_del !!}</strong></p>
                    <br>
                    <p>Message: <strong>{!! $msg !!}</strong></p>


                </div>
            </div>
        </div>
    </div>
</div>

