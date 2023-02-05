<section class="contact-us" id="contact-us">

        <div class="contact-title">
        <h2>Connect With us</h2>
        <p>We would love to respond to your queries and help you succeed. Feel free to get in touch with you.</p>
        </div>
    
        <div class="contact-row">
        
        <div class="contact-col-1">
            <h4 class="mb-3">Send your Request</h4>
            <form action="{{ route('send.email') }}" method="post" id="homeRequest">
            @csrf
                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" >
                        <span class="error-msg" id="error-name"></span>
                    </div>

                    <div class="contact-input-group">
                        <label class="phone">Phone</label>
                        <input type="text" name="phone" id="phone" >
                        <span class="error-msg" id="error-phone"></span>
                    </div>
                </div>


                <div class="contact-input-row">
                    <div class="contact-input-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" >
                        <span class="error-msg" id="error-email"></span>
                    </div>

                    <div class="contact-input-group">
                        <label class="subject">Subject</label>
                        <input type="text" name="subject" id="subject" oninput="this.value = this.value.toUpperCase()">
                        <span class="error-msg" id="error-subject"></span>
                    </div>
                </div>
                        <div class="contactus-text">
                        <label class="mb-3">Message</label>
                        <textarea name="content" id="msg" rows="5" ></textarea>
                        <span class="error-msg" id="error-msg"></span>
                        </div>

                        <button type="submit" class="d-grid" id="sendRequest-submit">Send</button>

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