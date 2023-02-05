<section class="booking-form-section">
    <div class="booking-form-buttons">

        <button type="button" class="btn-daily button active" target="1">
            <span>DAILY BOOKING FORM</span>
        </button>

        <button type="button" class="btn-weekly button" target="2">
            <span>WEEKLY BOOKING FORM</span>
        </button>

        <button type="button" class="btn-monthly button" target="3">
            <span>MONTHLY BOOKING FORM</span>
        </button>

    </div>

    <!-- <div class="alert hide">
         <span class="fas fa-exclamation-circle"></span>
         <span class="msg">Success</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
      </div> -->


    <section class="div1 single">

        <div class="booking-info-section">


            <div class="sect-1">

                <form action="{{ route('book.submit') }}" method="post" id="bookingForm">
                    @csrf
                    <h4 style="color: #005281"><strong>Renter Information</strong></h4>
                    <hr>

                    <div class="d-flex renter-info" style="gap: 20px; margin-bottom: 10px;">

                        <div style="width: 100%;">
                            <label class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Ex. Cruz" value="{{ $data->fname}} {{ $data->lname}}" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="errorname" style="font-size: 13px;"></span>
                        </div>

                        <div style="width: 100%;">
                            <label class="form-label">Contact Number</label>
                            <input type="number" id="number" name="con_num" placeholder="Enter phone no." value="" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="errornum" style="font-size: 13px;"></span>
                        </div>

                    </div>

                    <div class="d-flex renter-info" style="gap: 20px; margin-bottom: 25px;">

                        <div style="width: 100%;">
                            <label class="form-label">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter Address" value="">
                            <span class="text-danger" id="erroradd" style="font-size: 13px;"></span>
                        </div>

                        <div style="width: 100%;">
                            <label class="form-label">Contact Email</label>
                            <input type="email" id="email" name="con_email" placeholder="Enter Email" value="{{ $data->email}}" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="erroremail" style="font-size: 13px;"></span>
                        </div>

                    </div>

                    <div style="margin-bottom: 25px;">
                        <h5 style="color: #005281"><strong>Requirements</strong></h5> 
                        <hr class="bg-dark">
                        <h6>1. Driver's license</h6>
                        <h6>2. Pay before drive</h6>
                        
                        <h6>3. I accept this requirements Cashbond ₱2,000 fully refundable upon returning the car.</h6>
                        <div class="form-check pb-2">
                        <input class="form-check-input" id="cashbond" type="checkbox" value="2000">
                        <label class="form-check-label" for="cashbond">
                            ₱2,000
                        </label>
                        <span class="text-danger" id="errorcash" style="font-size: 13px;"><br></span>
                        </div>


                        <h6 class="text-primary pt-2" style="text-justify: inter-word; text-align: justify;">IMPORTANT: For clients outside Philippines, please provide us a VALID email address for us to communicate with you. Upon submission, a link of our WhatsApp, Viber, Telegram, 
                            and Facebook Messenger account will be sent to the email you provide.</h6>
                    </div>


                    <div style="margin-bottom: 25px;">
                        <h5 style="color: #005281"><strong>Mode of Delivery</strong></h5> 
                        <hr class="bg-dark">

                            <div class="d-flex mode-of-delivery">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mode_del" id="opt1" value="500">
                                    <label class="form-check-label" for="opt1">
                                        Airport ₱500
                                    </label>
                                </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_del" id="opt2" value="300">
                                <label class="form-check-label" for="opt2">
                                    Cebu City ₱300
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_del" id="opt3" value="350">
                                <label class="form-check-label" for="opt3">
                                    Mandaue City ₱350
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_del" id="opt4" value="500">
                                <label class="form-check-label" for="opt4">
                                    Talisay City ₱500
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_del" id="opt5" value="10">
                                <label class="form-check-label" for="opt5">
                                    Pick-up at Marcopolo Hotel ₱10
                                </label>
                            </div>
                        </div>

                        <span class="text-danger" id="errorradio" style="font-size: 13px;"><br></span>
                    </div>


                    <div style="width: 100%; margin-bottom: 20px;">
                        <label class="form-label"><strong>Leave a Message</strong><span style="font-size: 13px;"> (Optional)</span></label>
                        <textarea name="msg" id="" rows="5" ></textarea>
                    </div>

                    
                    
                </div>

                <div class="sect-2">
                    <div class="car-rent-info-wrapper">

                        <div class="d-flex justify-content-between align-items-center">

                            <p><strong>{{ $viewcar->brand}} {{ $viewcar->model}} {{ $viewcar->year}}</strong></p>

                            <div class="car-image">

                            <img src="/images/uploads/{{ $viewcar->carphoto }}"
                            id="car-image" style="object-fit: cover;"/>
                            </div>

                        </div>

                        <div class="date-time-wrapper">
                            <div class="start-date d-flex pb-2">
                                <div>
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" id="startdate" style="width: 100%;">
                                    <span class="text-danger" id="errorsd" style="font-size: 13px;"><br></span>

                                </div>
                                <div>
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" id="starttime">
                                    <span class="text-danger" id="errorst" style="font-size: 13px;"><br></span>
                                </div>
                            </div>
                            <div class="return-date d-flex">
                                <div>
                                    <label for="">Return Date</label>
                                    <input type="date" name="return_date" id="returndate">
                                    <span class="text-danger" id="errorrd" style="font-size: 13px;"><br></span>
                                </div>
                                <div>
                                    <label for="">Return Time</label>
                                    <input type="time" name="return_time" id="returntime">
                                    <span class="text-danger" id="errorrt" style="font-size: 13px;"><br></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="price-info">

                        <div class="alert alert-warning text-center" role="alert">
                        You are using <strong>DAILY RATE</strong> 
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>2 Days</p>
                            <p>₱ <span id="">0</span></p>
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>Cashbond (Fully Refundable)</p>
                            <p>₱ <span id="cashbondAmount">0</span></p>
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>Delivery Fee</p>
                            <p>₱ <span id="cashbondAmount">0</span></p>
                        </div>


                        <hr>

                        <div class="justify-content-between d-flex">
                            
                        
                            <h5><strong>Total Amount Payable</strong></h5>
                            <h5><strong>₱ <span id="totalAmountPayable">0</span></strong></h5>

                        </div>

                        <hr>

                        <div class="form-check agreement">
                        <input class="form-check-input" type="checkbox" value="" id="accept">
                        <label class="form-check-label" for="accept">
                        I agree with AJAB Transport Services' terms and privacy policy
                        </label>
                        <span class="text-danger" id="erroragree" style="font-size: 13px;"></span>

                        </div>
                        

                        <button class="d-grid text-white bookingform-sumbit" type="submit">SUBMIT</button>

                    </div>
                </form>

            </div>
        </div>
    </section>
    

 <!-- WEEKLY BOOKING FORM -->
 

<!-- MONTHLY BOOKING FORM -->

</section>
