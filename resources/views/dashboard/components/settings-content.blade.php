<section class="settings px-3 py-4">

<h5>Account Settings</h5>


<div class="settings-row pt-2 d-flex">

    <div class="settings-col-1">

        <div class="settings-image text-center bg-light px-5 py-4">

            <div class ="mb-4 settings-profile">
                <img src="user.jpg" alt=""
                height="95" width="95" class="rounded-circle" id="change-img">

            </div>

                <div class="">
                    <p class="fw-bold mb-0">John Christian Narbaja</p>
                    <p class="text-muted mb-0">Administrator</p>

                </div>

                    <div class="img-button mt-3">
                        <input type="file" name="" id="default-btn" accept="image/jpg, image/jpeg, image/png" hidden>
                        <button onclick ="defaultBtnActive()" type="button" class="btn btn-primary" id="default-btn">Choose Image</button>
                        <button type="button" class="btn btn-success" id="default-btn">Save</button>
                    </div>


        </div>
    

        
        <div class="settings-password  mt-4  bg-light">

            <div class="bg-light"><p class="px-2 py-2 settings-title">Edit Password</p></div>


                <!-- <div class ="py-2 settings-profile text-center mb-1">
                    <img src="user.jpg" alt=""
                    style="height: 65px; width: 65px;" class="rounded-circle">

                </div> -->


                <form action="" method="patch" class="px-3 py-2">

                <div class="mb-3">
                <input type="password" name="model" class="form-control" id="exampleFormControlInput1" placeholder="Old Password">
                </div>

                <div class="mb-3">
                <input type="password" name="model" class="form-control" id="exampleFormControlInput1" placeholder="New Password">
                </div>

                <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">Old Password</label> -->
                <input type="password" name="model" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password">
                </div>

                <div class="mb-2 password-button justify-content-right">
                <button type="button" class="btn btn-success" id="default-btn">Update</button>
                </div>

                </form>
            

        </div>
        </div>

         <div class="settings-col-2 ">




            <div class="settings-edit-profile bg-light">

                <p class="py-2 px-2 settings-title">Edit Profile</p>

                <p class="px-3 mb-0"><strong>Basic Info</strong></p>

                <form action="" class="px-3">

                <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="admin_name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
                </div>

                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="admin_email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                    </div>

                </div>

                <div class="mb-2">
                    <label for="validationDefault03" class="form-label">Address</label>
                    <input type="text" class="form-control" id="validationDefault03" required>
                    
                </div>




                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">City</label>
                        <input type="text" name="admin_email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Country</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="6001">
                    </div>

                </div>

                <!-- <p class=" mb-0"><strong>Basic Info</strong></p> -->

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Facebook Profile URL</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="https://www.facebook.com/myprofile">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">About Me</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="pb-3 password-button justify-content-right">
                        <button type="submit" class="btn btn-success" id="default-btn">Update Information</button>
                    </div>




                </form>


          
            </div>  


        </div>

    
</div>

</section>