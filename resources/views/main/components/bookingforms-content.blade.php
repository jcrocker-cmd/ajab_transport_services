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

    <section class="div1 single">

        <div class="booking-info-section">


            <div class="sect-1">

            <form enctype="multipart/form-data" action="{{ url('bookingformsubmit', ['slug' => $car_details->slug]) }}" method="POST" id="bookingForm">
                  @csrf

                    <h4 style="color: #005281"><strong>Renter Information</strong></h4>
                    <hr>

                    <div class="d-flex renter-info" >

                        <div style="width: 100%;">
                            <label class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Ex. Cruz" value="{{ $data->first_name}} {{ $data->last_name}}" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="errorname" ></span>
                        </div>

                        <div style="width: 100%;">
                            <label class="form-label">Contact Number</label>
                            <input type="number" id="number" name="con_num" placeholder="Enter phone no." value="" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="errornum" ></span>
                        </div>

                    </div>

                    <div class="d-flex renter-info">

                        <div style="width: 100%;">
                            <label class="form-label">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter Address" value="">
                            <span class="text-danger" id="erroradd" ></span>
                        </div>

                        <div style="width: 100%;" class="pb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" id="email" name="con_email" placeholder="Enter Email" value="{{ $data->email}}" onkeyup="javascript:capitalize(this);">
                            <span class="text-danger" id="erroremail" ></span>
                        </div>

                    </div>

                    <div style="margin-bottom: 25px;" class="requirements">
                        <h5 style="color: #005281"><strong>Requirements</strong></h5> 
                        <hr class="bg-dark">
                        <h6>1. Driver's license</h6>

                        <div class="license-wrapper pb-2">
                            <div class="license ">
                                <label class="form-check-label d-flex align-items-center" for="front-license">Front Side<strong class="pic-limit">(1mb limit)</strong></label>
                                <input type="file" name="front_license" id="front_license" accept="image/jpeg, image/png" size="1000000">
                                <span class="text-danger" id="errorfront" ></span>
                            </div>

                            <div class="license ">
                                <label class="form-check-label d-flex align-items-center" for="back-license" >Back Side <strong class="pic-limit">(1mb limit)</strong></label>
                                <input type="file" name="back_license" id="back_license" accept="image/jpeg, image/png">
                                <span class="text-danger" id="errorback" ></span>
                            </div>
                        </div>

                        <h6>2. Pay before drive</h6>
                        
                        <h6>3. I accept this requirements Cashbond ₱2,000 fully refundable upon returning the car.</h6>
                        <div class="form-check pb-2">
                        <input class="form-check-input" id="cashbond" type="checkbox" value="2000">
                        <label class="form-check-label" for="cashbond">
                            ₱2,000
                        </label>
                        <span class="text-danger" id="errorcash" ><br></span>
                        </div>


                        <h6 class="text-primary pt-2" style="text-justify: inter-word; text-align: justify;">IMPORTANT: For clients outside Philippines, please provide us a VALID email address for us to communicate with you. Upon submission, a link of our WhatsApp, Viber, Telegram, 
                            and Facebook Messenger account will be sent to the email you provide.</h6>
                    </div>


                    <div style="margin-bottom: 20px;" class="mode_del">
                        <h5 style="color: #005281"><strong>Mode of Delivery</strong></h5> 
                        <hr class="bg-dark">

                            <div class="d-flex align-items-center mode-of-delivery mx-0">
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

                        <span class="text-danger" id="errorradio" ><br></span>
                    </div>

                    <div style="margin-bottom: 20px;" class="pay_med">
                        <h5 style="color: #005281"><strong>Payment Method</strong></h5> 
                        <hr class="bg-dark">

                            <div class="d-flex mode-of-payment">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="pay1" value="Pay with Cash">
                                    <label class="form-check-label" for="pay1">
                                        Pay with Cash
                                    </label>
                                </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="pay2" value="Pay with G-Cash">
                                <label class="form-check-label" for="pay2">
                                        Pay with G-Cash
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="pay3" value="Pay with Card">
                                <label class="form-check-label" for="pay3">
                                        Pay with Card
                                </label>
                            </div>

                        </div>

                        <span class="text-danger" id="errorpay" ><br></span>
                        <h6 class="text-primary pt-2 important" style="text-justify: inter-word; text-align: justify;">IMPORTANT: Payment for our rental cars will be made outside of the system; we will not gather any confidential information within this system. We accept <strong>Cash, G-Cash, and credit cards.</strong> </h6>

                    </div>


                    <div style="width: 100%; margin-bottom: 20px;" class="msg">
                        <label class="form-label"><strong>Leave a Message</strong><span > (Optional)</span></label>
                        <textarea name="msg" id="" rows="5" ></textarea>
                    </div>

                    
                    
                </div>

                <div class="sect-2">
                    <div class="car-rent-info-wrapper">

                        <div class="d-flex justify-content-between align-items-center pb-2">

                            <div class="car_name"><strong>{{ $car_details->brand}} {{ $car_details->model}} {{ $car_details->year}}</strong> <span >{{ $car_details->transmission}}</span></div>

                            <div class="car-image">

                            <img src="/images/uploads/{{ $car_details->carphoto }}"
                            id="car-image" style="object-fit: cover;"/>
                            </div>

                        </div>

                        <div class="date-time-wrapper">
                            <div class="start-date d-flex pb-2">
                                <div>
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" id="startdate" style="width: 100%;">
                                    <span class="text-danger" id="errorsd" ><br></span>

                                </div>
                                <div>
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" id="starttime">
                                    <span class="text-danger" id="errorst" ><br></span>
                                </div>
                            </div>
                            <div class="return-date d-flex">
                                <div>
                                    <label for="">Return Date</label>
                                    <input type="date" name="return_date" id="returndate">
                                    <span class="text-danger" id="errorrd" ><br></span>
                                </div>
                                <div>
                                    <label for="">Return Time</label>
                                    <input type="time" name="return_time" id="returntime">
                                    <span class="text-danger" id="errorrt" ><br></span>
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

                        <div class="justify-content-between d-flex">
                            <p>Pay via Credit Card only <br>
                                (VAT) 2.75%
                            </p>
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
                        I agree with AJAB Transport Services' terms and conditions.
                        </label>
                        <span class="text-danger" id="erroragree" ></span>

                        </div>
                        

                        <!-- <a href="#" class="d-grid text-white bookingform-sumbit" id="submitBtn">Proceed to Payment</a> -->
                        <button class="d-grid text-white bookingform-sumbit" id="bookingform-sumbit" type="submit">SUBMIT</button>

                    </div>
                </form>

            </div>
        </div>
    </section>
    

</section>