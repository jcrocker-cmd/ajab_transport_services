<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">

                <div class="card-body">
                    <!-- @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif -->
                    
                    <strong><h3>User Request</h3></strong>
                    <p>FullName: <strong>{!! $name !!}</strong></p>
                    <p>Contact Email: <strong>{!! $email !!}</strong></p>
                    <p>Contact Phone: <strong>{!! $phone !!}</strong></p>
                    <br>
                    <hr>
                    <br>
                    <strong><h3>Message:</h3></strong>
                    <p>{!! $content !!}</p>

                </div>
            </div>
        </div>
    </div>
</div>
