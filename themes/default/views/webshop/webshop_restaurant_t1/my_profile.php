 <?php 
    // var_dump($this->data);
    $photo = base_url("assets/images/male.png");
    if($customer['image']!= '' ){
        $photo = $images.$customer['image'];
        // Open file
        $photoExists = @fopen($photo, 'r');

        // Check if file exists
        if($photoExists){
            $photo = $images.$customer['image'];
        }
    }
?>
<div class="profile-div profile-tab-account acc-divs" id="profile-div">
    <!-- <label class="text-info">Upload Photo <input type="file" name="profile_image" style="display: none;"  /><br/><span id="select_image" class="text-success"></span>
                </label> -->
    <form class="profile-container" id="profile-form">
        <div class="profile-header">
            <h2 class="font-weight-bold">Personal Details</h2>
            <div class="profile-pic">
                <img src="<?php echo ($photo) ?>" alt="Profile Image">
                <!-- <input type="text" id="edit-photo" name="profile_image"> -->

                <!-- <span> -->
                    <!-- <label class="text-info">Upload Photo <input type="file" name="profile_image" style=""  /><br/> -->
                    <!-- <span id="select_image" class="text-success"></span> -->
                    <!-- </label> -->
                     <!-- <input type="text" id="edit-photo" name="profile_image"></button> -->
                <!-- </span> -->
                <!-- <label class="text-info">Upload Photo <input type="file" name="profile_image" style="display: none;"  /><br/><span id="select_image" class="text-success"></span>
                </label> -->
            </div>
            <!-- <label class="text-info">Upload Photo 
                <input type="file" name="profile_image" style="display: none;"  /><br/>
                <span id="select_image" class="text-success"></span>
            </label> -->
        </div>

        <!-- <div class="input-row d-flex flex-column flex-md-row"> -->
            <!-- <div> -->
                <label for="fName">Full Name *</label>
                <input type="text" value="" id="fName" name="fName">
                <span class="p-correct" id="p-name-valid">Please enter only alphabets - [A- Z, a - z]</span>
            <!-- </div> -->
            <!-- <div>
                <label for="lName">Last Name</label>
                <input type="lName" value="" required  id="lName" name="lName">
            </div> -->
        <!-- </div> -->
       
        <label for="dob">Date of Birth</label>
        <input type="date"  id="dob" name="dob">
        <span class="p-correct" id="p-dob-valid">Please enter a valid date</span>

        <label for="email">Email</label>
        <div class="email-valid">
            <input type="email" value=""  name="email" id="email">
        </div>
        <span class="p-correct" id="p-email-valid">Please enter correct email format (eg. name@domain.com)</span>

        <label for="Billing_Address">Billing Address</label>
        <div class="Billing_Address"><input type="text" value="" name="Billing_Address" id="Billing_Address_Input" 
         readonly style="cursor: pointer;" title="">
        </div>


        <!-- <label>Address</label>
        <input type="text" value="" required disabled id="profile-address"> -->

        <label for="profile-contact">Contact Number</label>
        <input type="number" value="" disabled id="profile-contact" >

        <!-- <label>Password</label>
        <div>
            <input type="password" value="" required >
        </div>
        <div class="password-note">Password must be at least 8 characters long</div> -->

        <div class="shipping-section">
            <h2 class="shipping-address-heading font-weight-bold">Shipping Addresses</h2>
            <div class="shipping-boxes d-flex flex-column flex-md-row" id="shipping-boxes">
                <!-- <div class="shipping-box primary" type="button" data-toggle="modal" data-target="#addressModal">                    
                    <strong>Home</strong><br>
                    Flat 204, Al Fahidi Heights, Near Al Fahidi Metro Station, Bur Dubai,<br>
                    Dubai, United Arab Emirates<br>
                    Zip: 6755
                </div>
                <div class="shipping-box" type="button" data-toggle="modal" data-target="#addressModal">
                    <strong>Work</strong><br>
                    Flat 204, Al Fahidi Heights, Near Al Fahidi Metro Station, Bur Dubai,<br>
                    Dubai, United Arab Emirates<br>
                    Zip: 6755
                </div> -->

                <div class="shipping-box add-new" type="button" data-toggle="modal" data-target="#addressModalWS">
                    <img src="<?= $assets. 'restaurant/img/add_address_icon.svg'?>" alt="add-address-icon.svg"/>
                </div>
            </div>
        </div>
        <div class="save-btn-div">
            <button type="submit" class="save-btn" id="save-btn-profile">Save</button>
        </div>
    </form>
</div>
