<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Webshop Profile</title>

        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/font-awesome.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/bootstrap-grid.min.css" media="all" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/bootstrap-reboot.min.css" media="all" /> -->
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/colors/<?= $webshop_settings->theme_color ?>.css" media="all" />

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $uploads ?>logos/favicon-16x16.png">
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/custom.css" media="all" />  
    </head>
    <body class="page-template-default page woocommerce-wishlist can-uppercase">
        <div id="page" class="hfeed site">            
            <?php
            include_once('header.php');
            ?>            
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb" style="text-transform: capitalize;">
                            <a href="<?= base_url('webshop/index') ?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            My Account
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Profile <?= $action?>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">                                    
                                    <!-- .entry-header -->                                 
                                    <div id="primary" class="content-area">
                                        <main id="main" class="site-main">
                                            <?php if($this->session->flashdata('message')){  
                                                echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';  
                                             } else if($this->session->flashdata('error')){
                                                 echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                                             }else if($this->session->flashdata('warning')){
                                                 echo '<div class="alert alert-warning">'.$this->session->flashdata('warning').'</div>';
                                             }else if($this->session->flashdata('info')){
                                                echo '<div class="alert alert-info">'.$this->session->flashdata('info').'</div>';
                                             } 
                                           ?>
                                           
                                            <div class="row">
                                                <div class="container rounded bg-white mt-5 mb-5">
                                                     <?php echo form_open('webshop/profile_update', 'class="email" id="myform" enctype="multipart/form-data" '); ?>
                                                    <div class="row">
                                                        <div class="col-md-3 border-right">
                                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                                <?php
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
                                                                <img class="rounded-circle mt-5" alt="<?=$customer['name']?>" src="<?=$photo?>" />
                                                                <span class="fw-bold"><?=$customer['name']?></span>
                                                                <span class="text-black-50"><?=$customer['email']?></span>
                                                                <span><label class="text-info">Upload Photo <input type="file" name="profile_image" style="display: none;"  /><br/><span id="select_image" class="text-success"></span></label></span>
                                                            </div>
                                                        </div>
                                                     
                                                       
                                                        <div class="col-md-5 border-right border-start border-end">
                                                            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
                                                                    <h4 class="float-left ">Profile Details </h4><span class="float-right"><a class="text-primary" href="<?=base_url("webshop/your_profile/".($action == "edit" ? "view" : "edit"));?>"><?= $action == "edit" ? "View" : "Edit"?></a></span>
                                                                </div>
                                                            <div class="p-3 py-5 ">                                                                                                                                 
                                                                <div class="row">                                                                    
                                                                    <div class="col-md-12 mb-2">
                                                                        <label class="labels mb-1">Full Name <span class="text-danger">*</span></label>
                                                                        <?=form_error('name')?>
                                                                        <input type="text" class="form-control" placeholder="first name" name="name" value="<?=$customer['name']?>"  />
                                                                    </div>
                                                                </div>   
                                                                <div class="row mt-3 mb-4">                                                                    
                                                                    <div class="col-md-12 mb-4">
                                                                        <label class="labels mb-1">Phone Number <span class="text-danger">*</span></label>
                                                                        <?=form_error('phone')?>
                                                                        <input name="phone" readonly="readonly" type="text" class="form-control" placeholder="enter phone number" value="<?=$customer['phone']?>" />
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <label class="labels mb-2">Email ID <span class="text-danger">*</span></label>
                                                                        <?=form_error('email')?>
                                                                        <input name="email" type="email" class="form-control" placeholder="enter email id" value="<?=$customer['email']?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-6">
                                                                        <label class="labels">Country <span class="text-danger">*</span></label>
                                                                        <?=form_error('country')?>
                                                                        <input name="country" type="text" class="form-control" placeholder="country" value="<?=$customer['country']?>" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="labels">State/Region <span class="text-danger">*</span></label>
                                                                        <?=form_error('state')?>
                                                                        <input name="state" type="text" class="form-control" value="<?=$customer['state']?>" placeholder="state" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-6">
                                                                        <label class="labels" for="city">City <span class="text-danger">*</span></label>
                                                                        <?=form_error('city')?>
                                                                        <input name="city" id="city" type="text" class="form-control" placeholder="city name" value="<?=$customer['city']?>" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="labels">Pincode <span class="text-danger">*</span></label>
                                                                        <?=form_error('pincode')?>
                                                                        <input name="pincode" maxlength="6" type="text" class="form-control" value="<?=$customer['postal_code']?>" placeholder="pincode" />
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 border-start border-end ">
                                                            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
                                                                <h4 class="text-left">Billing Details</h4>
                                                            </div>
                                                            <div class="p-3 py-5">
                                                                
                                                                <div class="col-md-12"><label class="labels mb-2">Business/Billing Name</label>
                                                                    <input name="company" type="text" class="form-control" placeholder="Bussiness Name" value="<?=$customer['company']?>">
                                                                </div> 
                                                                <br> 
                                                                <div class="col-md-12"><label class="labels mb-2">Pan Number</label><input name="pan_card" type="text" class="form-control" placeholder="Pan Number" value="<?=$customer['pan_card']?>"></div> <br>
                                                                <div class="col-md-12"><label class="labels mb-2">VAT Number</label><input name="vat_no" type="text" class="form-control" placeholder="Vat Number" value="<?=$customer['vat_no']?>"></div> <br>
                                                                <div class="col-md-12"><label class="labels mb-2">GST Number</label><input name="gstn_no" type="text" class="form-control mb-3" placeholder="Enter gstn Number" value="<?=$customer['gstn_no']?>"></div>
                                                                <div class="col-md-12"><label class="labels mb-2">Address</label><input name="address" type="text" class="form-control" placeholder="enter address" value="<?=$customer['address']?>"></div>
                                                                
                                                            </div>
                                                            <div class="mt-5 text-center"><button name="submitProfle" id="submitProfle" class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
                                                        </div
                                                       
                                                    </div>
                                                       
                                                    </div>
                                                 <?php echo form_close()?>
                                            </div>
                                    </div>
                                </div>
                            </main>
                        </div>                                    
                    </div>
                    <!-- .hentry -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->
    </div>
    <!-- #content -->
    <div class="col-full">

<?php include_once('sections/section_recently_viewed_products.php'); ?>

        <?php include_once('sections/section_footer_brands.php'); ?>

    </div>
    <!-- .col-full -->
<?php include_once('footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/tether.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/hidemaxlistitem.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/hidemaxlistitem.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/scrollup.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/pace.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/slick.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/scripts.js"></script>

<script>
$(document).ready(function() {
    
    <?php
        if($action == "edit"){
    ?>
            $('input').removeAttr('disabled');
            $('#submitProfle').show();
    <?php
        } else {
    ?>
            $('input').attr('disabled','disabled');
            $('#submitProfle').hide();
    <?php        
        }
    ?>
            
    $('input[type="file"]').removeAttr('disabled');
    $('input[type="file"]').change(function(e) {
        var geekss = e.target.files[0].name;
        $("#select_image").html(geekss + '<br/> is the selected file.<br/><button name="upload_image" class="btn btn-info btn-sm profile-button" type="submit">Upload Photo</button>');
    });
    
    
});
        
</script>
</body>
</html>