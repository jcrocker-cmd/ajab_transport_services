<section class="settings px-3 py-4">

<h5>Account Settings</h5>


<div class="settings-row pt-2 d-flex">

    <form action="/adminpp" method="post">
        @csrf
        @method('put')

    <div class="settings-col-1">

        <div class="settings-image text-center bg-light px-5 py-4">

            <div class ="mb-4 settings-profile">
                <img src="images/default-user.webp"
                height="95" width="95" class="rounded-circle" id="change-img" style="object-fit: cover;">

            </div>

                <div class="">
                    <p class="fw-bold mb-0">John Christian Narbaja</p>
                    <p class="text-muted mb-0">Administrator</p>

                </div>

                    <div class="img-button mt-3">
                        <input type="file" name="adminpp" id="default-btn" accept="image/jpg, image/jpeg, image/png" hidden>
                        <button onclick ="defaultBtnActive()" type="button" class="btn btn-primary" id="default-btn">Choose Image</button>
                        <button type="submit" class="btn btn-success" id="default-btn">Save</button>
                    </div>
    </form>

        </div>
    

        
        <div class="settings-password  mt-4  bg-light">

            <div class="bg-light"><p class="px-2 py-2 settings-title">Edit Password</p></div>


                <form action="" method="patch" class="px-3 py-2">


                <div class=" mb-3  input-group">
                <input type="password" class="form-control border-right-0" placeholder="Old Password" id="oldPassword">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword1" style="cursor: pointer;"></i></span>
                </div>

                <div class=" mb-3  input-group">
                <input type="password" class="form-control border-right-0" placeholder="New Password" id="newPassword">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i></span>
                </div>

                <div class=" mb-3  input-group">
                <input type="password" class="form-control border-right-0" placeholder="Confirm Password" id="confirmPassword">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword3" style="cursor: pointer;"></i></span>
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

                <p class="px-3 mb-2"><strong>Basic Info</strong></p>

                <form action="" class="px-3">

                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input type="text" name="admin_fname" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Juan">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                        <input type="text" name="admin_mname" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Dela">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" name="admin_lname" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Cruz">
                    </div>

                </div>

                

                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="admin_email" class="form-control" id="exampleFormControlInput1" placeholder="example@email.com">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="09123456789">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Birth-Date</label>
                        <input type="date" name="admin_no" class="form-control" id="exampleFormControlInput1">
                    </div>

                </div>
                

                <p class=" mb-2"><strong>Address</strong></p>

                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Purok/Street</label>
                        <input type="email" name="admin_email" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Purok 2 / Lot 1 Blk 1">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Baranggay</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="Ex. Salvador">
                    </div>
                </div>

                

                <div class="mb-2 d-flex" style="gap: 20px;" >
                    
                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">Town</label>
                        <input type="text" name="admin_email" class="form-control" id="exampleFormControlInput1" placeholder="Consolacion">
                    </div>

                    <div style="width: 100%;">
                        <label for="exampleFormControlInput1" class="form-label">City</label>
                        <input type="text" name="admin_no" class="form-control" id="exampleFormControlInput1" placeholder="Cebu City">
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