<section class="booking-form-section">
    <div class="booking-form-buttons">

        <a href="/bookingforms/{{ $car_details->slug }}"  class="btn-daily button">
            <span>DAILY BOOKING FORM</span>
        </a>

        <a href="/weekly_bookingforms/{{ $car_details->slug }}" class="btn-weekly button active">
            <span>WEEKLY BOOKING FORM</span>
        </a>

        <a href="/monthly_bookingforms/{{ $car_details->slug }}" class="btn-monthly button">
            <span>MONTHLY BOOKING FORM</span>
        </a>

    </div>

    <section class="">
    <form enctype="multipart/form-data" action="{{ url('weekly_bookingformsubmit', ['slug' => $car_details->slug]) }}" method="POST" id="weekly_bookingForm" class="was-validated">
                  @csrf

        <div class="booking-info-section">


            <div class="sect-1">



                    <h4 style="color: #005281"><strong>Renter Information</strong></h4>
                    <hr>

                    <div class="d-flex renter-info" >

                        <div style="width: 100%;">
                            <label class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control " name="name" placeholder="Ex. Cruz" value="{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }} " onkeyup="javascript:capitalize(this);" pattern=".{8,}" required>
                            <!-- <span class="text-danger" id="errorname">@error('name') {{$message}} @enderror</span> -->
                            <div class="invalid-feedback">
                                Enter Name (min:8)
                            </div>
                        </div>

                        <div style="width: 100%;">
                            <label class="form-label">Contact Number</label>
                            <input type="number" id="number" class="form-control" name="con_num" placeholder="Enter phone no." value="" onkeyup="javascript:capitalize(this);" required>
                            <!-- <span class="text-danger" id="errornum">@error('con_num') {{$message}} @enderror</span> -->
                            <div class="invalid-feedback">
                                Enter your contact No.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex renter-info">

                        <div style="width: 100%;">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control"  id="address" name="address" placeholder="Enter Address" value="" required>
                            <!-- <span class="text-danger" id="erroradd">@error('address') {{$message}} @enderror</span> -->
                            <div class="invalid-feedback">
                                Enter you valid address.
                            </div>
                        </div>

                        <div style="width: 100%;" class="pb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="email" name="con_email" placeholder="Enter Email" value="{{ Auth::user()->email }} " onkeyup="javascript:capitalize(this);" required>
                            <!-- <span class="text-danger" id="erroremail">@error('con_email') {{$message}} @enderror</span> -->
                            <div class="invalid-feedback">
                                Enter valid contact email.
                            </div>
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
                                <span class="error" id="errorfront"></span>
                            </div>

                            <div class="license ">
                                <label class="form-check-label d-flex align-items-center" for="back-license" >Back Side <strong class="pic-limit">(1mb limit)</strong></label>
                                <input type="file" name="back_license" id="back_license" accept="image/jpeg, image/png" size="1000000">
                                <span class="error" id="errorback"></span>
                            </div>
                        </div>

                        <h6>2. Pay before drive</h6>
                        
                        <h6>3. I accept this requirements Cashbond ₱2,000 fully refundable upon returning the car.</h6>
                        <div class="form-check pb-2">
                        <input class="form-check-input" name="cashbond" id="cashbond" type="checkbox" value="2000" required>
                        <label class="form-check-label" for="cashbond">
                            ₱2,000
                        </label>
                        <!-- <span class="error-message cashbondError" id="errorcash" ><br></span> -->
                        <div class="invalid-feedback">
                                You need to accept cashbond.
                            </div>
                        </div>
                        


                        <h6 class="text-primary pt-2" style="text-justify: inter-word; text-align: justify;">IMPORTANT: For clients outside Philippines, please provide us a VALID email address for us to communicate with you. Upon submission, a link of our WhatsApp, Viber, Telegram, 
                            and Facebook Messenger account will be sent to the email you provide.</h6>
                    </div>


                    <div style="margin-bottom: 20px;" class="mode_del">
                        <h5 style="color: #005281"><strong>Mode of Delivery</strong></h5> 
                        <hr class="bg-dark">

                            <div class="d-flex align-items-center mode-of-delivery mx-0">
                                <div class="form-check">
                                    <input class="form-check-input mode_del" type="radio" name="mode_del" id="opt1" value="Airport" data-delivery-price="500" required>
                                    <label class="form-check-label" for="opt1">
                                        Airport ₱500
                                    </label>
                                </div>

                            <div class="form-check">
                                <input class="form-check-input mode_del" type="radio" name="mode_del" id="opt2" value="Cebu City" data-delivery-price="300">
                                <label class="form-check-label" for="opt2">
                                    Cebu City ₱300
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input mode_del" type="radio" name="mode_del" id="opt3" value="Mandaue City" data-delivery-price="350">
                                <label class="form-check-label" for="opt3">
                                    Mandaue City ₱350
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input mode_del" type="radio" name="mode_del" id="opt4" value="Talisay City" data-delivery-price="500">
                                <label class="form-check-label" for="opt4">
                                    Talisay City ₱500
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_del" id="opt5" value="Pick-up at Marcopolo" data-delivery-price="10">
                                <label class="form-check-label" for="opt5">
                                    Pick-up at Marcopolo Hotel ₱10
                                </label>
                            </div>

                        </div>

                        <!-- <span id="error_mode_del" class="error-message paymentError"><br></span> -->
                        <div class="invalid-feedback">
                        Please select an option.
                        </div>
                    </div>


                    <div style="margin-bottom: 20px;" class="pay_med">
                        <h5 style="color: #005281"><strong>Payment Method</strong></h5> 
                        <hr class="bg-dark">

                            <div class="d-flex mode-of-payment">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="pay1" value="Pay with Cash" required>
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

                        <!-- <span class="error-message" id="errorpay" ><br></span> -->
                        <div class="invalid-feedback">
                        Please select an option.
                        </div>

                        <h6 class="text-primary pt-2 important" style="text-justify: inter-word; text-align: justify;">IMPORTANT: Payment for our rental cars will be made outside of the system; we will not gather any confidential information within this system. We accept <strong>Cash, G-Cash, and credit cards.</strong> </h6>
                        
                        <div class="accepts pt-2">
                        <h5>Card Payments Accepted:</h5>
                        <img src="/images/payment.png" alt="">
                        </div>
                    </div>


                    <div style="width: 100%; margin-bottom: 20px;" class="msg">
                        <label class="form-label"><strong>Leave a Message</strong><span > (Optional)</span></label>
                        <textarea name="msg" id="" rows="5" ></textarea>
                    </div>

                    
                    
                </div>

                <div class="sect-2">
                    <div class="car-rent-info-wrapper">

                        <div class="d-flex justify-content-between align-items-center pb-2">
                            <div classs="">
                            <div class="car_name"><strong>{{ $car_details->brand}} {{ $car_details->model}} {{ $car_details->year}}</strong> <span >{{ $car_details->transmission}}</span></div>
                            <div class="car_price"><strong>₱ {{ number_format($car_details->weeklyrate) }} / Weekly</strong></div>
                            </div>
                            <div class="car-image">

                            <img src="/images/uploads/{{ $car_details->carphoto }}"
                            id="car-image" style="object-fit: cover;"/>
                            </div>

                        </div>

                        
                    <div class="date-time-wrapper">
                            <div class="start-date d-flex pb-1">
                                <div>
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" id="startdate" style="width: 100%;">
                                    <span class="error-message" id="errorsd" ><br></span>

                                </div>
                                <div>
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" id="starttime">
                                    <span class="error-message" id="errorst" ><br></span>
                                </div>
                            </div>
                            <div class="return-date d-flex">
                                <div>
                                    <label for="">Return Date</label>
                                    <input type="date" name="return_date" id="returndate" readonly="readonly">
                                    <span class="error-message" id="errorrd" ><br></span>
                                </div>
                                <div>
                                    <label for="">Return Time</label>
                                    <input type="time" name="return_time" id="returntime">
                                    <span class="error-message" id="errorrt" ><br></span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="price-info">

                        <div class="alert alert-warning text-center" role="alert">
                        You are using <strong>WEEKLY RATE</strong> 
                        </div>

                        <div style="width: 100%;" hidden>
                            <label class="form-label">Dailyrate</label>
                            <input type="text" id="car_price" name="" value="{{ $car_details->weeklyrate}}">
                        </div>

                        <div style="width: 100%;" hidden>
                            <label class="form-label">Total Rates</label>
                            <input type="text" id="total_rates_input" name="total_rates" value="0">
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>Total Rates</p>
                            <p>₱ <span id="total_rates">0</span></p>
                        </div>

                        <div class="justify-content-between total_weeks_months">
                            <div><label>Total Week/s</label></div>

                            <div>
                            <select id="total_weeks_select" name="total_weeks">
                                <?php
                                for ($i = 1; $i <= 20; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                            </div>

                        </div>


                        <div class="justify-content-between d-flex">
                            <p>Cashbond (Fully Refundable)</p>
                            <p>₱ <span id="cashbondAmount">0</span></p>
                        </div>

                        <div style="width: 100%;" hidden>
                            <label class="form-label">Cashbond Input</label>
                            <input type="text" id="cashbondAmount_input" name="cashbondAmount" placeholder="Enter Address" value="0">
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>Delivery Fee</p>
                            <p>₱ <span id="delivery_fee_value">0</span></p>
                        </div>

                        
                        <div style="width: 100%;" hidden>
                            <label class="form-label">Delivery Fee</label>
                            <input type="text" id="delivery_fee_value_input" name="deliveryFee" placeholder="Enter Address" value="0">
                        </div>

                        <div class="justify-content-between d-flex">
                            <p>Pay via Credit Card only <br>
                                (VAT) 2.75%
                            </p>
                            <p>₱ <span id="vat">0</span></p>
                        </div>

                        <div style="width: 100%;" hidden>
                            <label class="form-label">VAT</label>
                            <input type="number" id="vat_input" name="" value="0" data-rules="bail|required|number|between:1,10">
                        </div>


                        <hr>

                        <div class="justify-content-between d-flex">
                            
                        
                            <h5><strong>Total Amount Payable</strong></h5>
                            <h5><strong>₱ <span id="totalAmountPayable">0</span></strong></h5>

                        </div>

                        <div style="width: 100%;" hidden>
                            <label class="form-label">Total Amount Payable</label>
                            <input type="number" id="total_amount_payable_input" name="total_amount_payable">
                        </div>
                        

                        <hr>

                        <div class="form-check agreement">
                            <input class="form-check-input" name="agreement" type="checkbox" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                            I agree with AJAB Transport Services' terms and conditions.
                            </label>
                            <!-- <span class="error-message" id="erroragree" ></span> -->
                            <div class="invalid-feedback">
                                You need to accept agreement.
                            </div>

                        </div>
                        

                        <!-- <a href="#" class="d-grid text-white bookingform-sumbit" id="submitBtn">Proceed to Payment</a> -->
                        <button class="d-grid text-white bookingform-sumbit" id="bookingform-sumbit" type="submit">SUBMIT</button>

                    </div>
            </div>


        </div>
        </form>

    </section>

</section>