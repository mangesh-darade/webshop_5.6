<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Webshop My Address</title>

        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/font-awesome.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-grid.min.css" media="all" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-reboot.min.css" media="all" /> -->
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/colors/<?=$webshop_settings->theme_color?>.css" media="all" />
        
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=$uploads?>logos/favicon-16x16.png">
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/custom.css" media="all" />  
    </head>
    <body class="page-template-default page woocommerce-wishlist can-uppercase">
        <div id="page" class="hfeed site">
            
            <?php 
            
                include_once('header.php'); 
                
            ?>
            
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="<?=base_url('webshop/index')?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            My Account
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Addresses
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Your Address</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->
                                 
                                    <div class="row">
                                        <?php
                                        if(is_array($addresses)){
                                            foreach ($addresses as $key => $addresse) {
                                                $addressJson = json_encode($addresse);
                                        ?>
                                        <div class="col-md-4 col-sm-12" style="height:300px; border: thin solid #dddddd; padding: 15px;">
                                            <h4><?=$addresse['address_name']?><br/><small><?=$addresse['company_name']?></small></h4>
                                            <p>
                                                <?=$addresse['line1']?><br/><?=$addresse['line2']?><br/>
                                                <?=$addresse['state']?> <?=$addresse['country']?><br/>
                                                <?=$addresse['city']?> <?=$addresse['postal_code']?><br/>
                                                <?=$addresse['email_id']?> <br/>
                                                <?=$addresse['phone']?>
                                            </p>
                                            <p> 
                                                <?php if($addresse['is_default']) {?>
                                                <a class="btn btn-success btn-sm" href="#"> Default</a>  
                                                <?php } else { ?>
                                                <a  class="btn btn-default btn-sm  text-primary" href="<?=base_url("webshop/address_set_default/".$addresse['company_id'].'/'.$addresse['id'])?>"> Make Default</a> 
                                                <a class="btn btn-default btn-sm text-danger" href="<?=base_url("webshop/address_delete/".$addresse['id'])?>">Delete</a>
                                                <?php } ?>
                                                <a id="<?=$key?>" class="btn btn-default btn-sm text-info edit_address" href="#" data-toggle="modal" data-target="#addressModal" >Edit</a>  
                                                <span id="address_<?=$key?>" style="display:none;"><?=$addressJson?></span>
                                            </p>
                                        </div>
                                        <?php
                                            }
                                        }                                        
                                        ?>
                                        
                                        <div id="add_new_address" class="col-md-4 col-xs-12" style="height:300px; border: thin solid #dddddd; cursor: pointer;" >
                                            <h2 style="margin-top:10%; text-align: center; font-size: 2.8em; color: #101010;"><span style="font-size: 1.5em; color: #cccccc;">+</span><br/>Add Address</h2>
                                        </div>
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
           <?php include_once('footer.php'); ?>
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel">Model Title</h5>
        <button type="button" class="close btn-close" data-dismiss="modal"  data-bs-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
        <form action="<?= base_url('webshop/webshop_request') ?>" class="woocommerce-checkout" method="post" name="addressform" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="woocommerce-billing-fields__field-wrapper-outer">
                      <div class="woocommerce-billing-fields__field-wrapper">
                          <p id="address_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                              <label class="" for="address_name">Address Full Name
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="text" value="<?= isset($postdata['address_name']) ? $postdata['address_name'] : '' ?>" placeholder="Address Full Name"  maxlength="60" id="address_name" name="address_name" required="required" class="input-text ">
                          </p>
                          <p id="company_name_field" class="form-row form-row-last validate-required">
                              <label class="" for="company_name">Company Name (Optional)</label>
                              <input type="text" value="<?= isset($postdata['company_name']) ? $postdata['company_name'] : '' ?>" placeholder="Company Name"  maxlength="60" id="company_name" name="company_name" class="input-text ">
                          </p>
                          <div class="clear"></div>
                          <p id="address_line_1_field" class="form-row form-row-wide address-field validate-required">
                              <label class="" for="address_line_1">Area , Street Address
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="text" value="<?= isset($postdata['address_line_1']) ? $postdata['address_line_1'] : '' ?>" placeholder="Street address"  maxlength="200" id="address_line_1" name="address_line_1" required="required" class="input-text ">
                          </p>
                          <p id="address_line_2_field" class="form-row form-row-wide address-field">
                              <input type="text" value="<?= isset($postdata['address_line_2']) ? $postdata['address_line_2'] : '' ?>" placeholder="Apartment, suite, unit etc. (optional)"  maxlength="200" id="address_line_2" name="address_line_2" class="input-text ">
                          </p>
                          <div class="clear"></div>
                          <p id="country_field" class="form-row form-row-last validate-required">
                              <label class="" for="country">Country
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input list="country" class="input-text" value="India" required="required"  maxlength="35" id="country" name="country" onchange="setState(this.value)" >
                              <datalist id="country">
                                  <option value="India" selected="selected">
                              </datalist>
                          </p> 
                          <p id="billing_state_field" class="form-row form-row-first validate-required">
                              <label class="" for="state">State
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <select data-placeholder="" autocomplete="address-level1" class="state_select select2-hidden-accessible" id="state" name="state" required="required" tabindex="-1" aria-hidden="true">
                                  <option value="">Select an option...</option>
                                  <?php
                                    if (is_array($state_list)) {
                                        foreach ($state_list as $state) {

                                            $selected = isset($postdata['state']) && $postdata['state'] == ($state['name'] . '~' . $state['code']) ? ' selected="selected "' : '';

                                            echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . '>' . $state['name'] . '</option>';
                                        }
                                    }
                                  ?>
                              </select>
                              <input type="text" id="state_name" name="state_name" disabled="disabled" class="input-text" style="display: none;"  />
                          </p>
                          <p id="city_field" class="form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                              <label class="" for="city">Town / City
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="text" value="<?= isset($postdata['city']) ? $postdata['city'] : '' ?>" placeholder="City Name" maxlength="40" id="city" name="city" required="required" class="input-text ">
                          </p>
                          <p id="postcode_field" class="form-row form-row-first address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                              <label class="" for="postal_code">Postcode / ZIP
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="text" value="<?= isset($postdata['postal_code']) ? $postdata['postal_code'] : '' ?>" placeholder="Address Pincode" maxlength="6" id="postal_code" name="postal_code" required="required" class="input-text">
                          </p>
                          <p id="phone_field" class="form-row form-row-last validate-required validate-phone">
                              <label class="" for="phone">Mobile Number
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="tel" value="<?= isset($postdata['phone']) ? $postdata['phone'] : '' ?>" placeholder="Valid Phone Number" maxlength="10" id="phone" name="phone" required="required" class="input-text">
                          </p>
                          <p id="email_field" class="form-row form-row-first validate-required validate-email">
                              <label class="" for="email_id">Email Address
                                  <abbr title="required" class="required">*</abbr>
                              </label>
                              <input type="email" value="<?= isset($postdata['email_id']) ? $postdata['email_id'] : '' ?>" placeholder="Valid Email Id" id="email_id" name="email_id" required="required" class="input-text">
                          </p>
                          <p id="email_field" class="form-row form-row-first validate-required validate-email">
                              <label class="" for="default_address">
                                  <input type="checkbox" value="1" id="default_address" name="default_address" />
                                  <abbr title="required" class="required">*</abbr>
                                  Set default address
                              </label>                              
                          </p>
                      </div>
                  </div>
                  <!-- .woocommerce-billing-fields__field-wrapper-outer -->
            </div>
            <div class="modal-footer">
                <input type="hidden" id="action" name="action" value="manage_address" />
                <input type="hidden" id="addressModalAction" name="addressModalAction" value="" />
                <input type="hidden" id="addressModalActionId" name="addressModalActionId" value="" />
                <input type="hidden" id="customer_id" name="customer_id" value="<?=$customer_id?>" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_address" class="btn btn-primary">Save Address</button>
            </div>
        </form>
    </div>
  </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/tether.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/scrollup.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/pace.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/slick.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/scripts.js"></script>

        <script>
        
            $(document).ready(function(){
                
                $('#add_new_address').click(function(){
                    
                    $('#addressModal').modal('show');
                    $('#addressModalLabel').html('Add Address');
                    $('#addressModalAction').val('add');
                    $('#addressModalActionId').val('');
                    
                    
                });
                
                $('.edit_address').click(function(){
                    
                    $('#addressModal').modal('show');
                    $('#addressModalLabel').html('Edit Address');
                    $('#addressModalAction').val('edit');
                    
                    var addressId = $(this).attr('id');
                    var addressData = JSON.parse($('#address_'+addressId).html());
                    
                    $('#addressModalActionId').val(addressId);                    
                                       
                    $('#address_name').val(addressData.address_name);
                    $('#company_name').val(addressData.company_name);
                    $('#address_line_1').val(addressData.line1);
                    $('#address_line_2').val(addressData.line2);
                    $('#country').val(addressData.country);
                    $('#state').val(addressData.state+'~'+addressData.state_code);
                    $('#city').val(addressData.city);
                    $('#postal_code').val(addressData.postal_code);
                    $('#phone').val(addressData.phone);
                    $('#email_id').val(addressData.email_id);
                    
                    if(addressData.is_default == 1) {
                        $('#default_address').prop('checked', true);
                    }
                    
                });
                
            });
        
        </script>
        
    </body>
</html>