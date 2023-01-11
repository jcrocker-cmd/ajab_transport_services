<section class="contact-us" id="contact-us">

        <div class="contact-title">
        <h2>Connect With us</h2>
        <p>We would love to respond to your queries and help you succeed. Feel free to get in touch with you.</p>
        </div>
    
        <div class="contact-row">
        
        <div class="contact-col-1">
            <h4 class="mb-3">Send your Request</h4>
            <form action="{{ route('send.email') }}" method="post">
            @csrf
                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label>Name</label>
                        <input type="text" name="name" id="" >
                        <span class="error-msg">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="contact-input-group">
                        <label class="phone">Phone</label>
                        <input type="text" name="phone" id="" >
                        <span class="error-msg">@error('phone') {{$message}} @enderror</span>
                    </div>
                </div>


                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label>Email</label>
                        <input type="email" name="email" id="" >
                        <span class="error-msg">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="contact-input-group">
                        <label class="subject">Subject</label>
                        <input type="text" name="subject" oninput="this.value = this.value.toUpperCase()">
                        <span class="error-msg">@error('subject') {{$message}} @enderror</span>
                    </div>
                </div>
                        <div class="contactus-text">
                        <label class="mb-3">Message</label>
                        <textarea name="content" id="" rows="5" ></textarea>
                        <span class="error-msg">@error('content') {{$message}} @enderror</span>
                        </div>

                        <div class="contactus-button">
                        <button type="submit">Send</button>
                        </div>

            </form>
        </div>
        <div class="contact-col-2">
            <h4 class="col-2-title">Reach Us</h4>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="text">
                    <h4>Address</h4>
                    <p>Lot 9 Blk 6 Windfields Subdivision <br>
                        Danglag, Consolacion City, Cebu<br>
                        Philippines, 6001
                    </p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <div class="text">
                    <h4>Phone</h4>
                    <p>09127725518</p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <div class="text">
                    <h4>Email</h4>
                    <p>narbajajc@gmail.com</p>
                </div>
            </div>

        </div>
    </div>
</section>