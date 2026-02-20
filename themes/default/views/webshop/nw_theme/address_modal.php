
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addressModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<form class="modal fade" data-backdrop="static" data-keyboard="false" id="addressModalWS" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg d-flex justify-content-center align-items-center">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="addressModalLabel">Address Label</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-address-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body address">
                <div class="form-container">
                    <!-- <span>Address Label</span> -->
                    <div class="address-label-group">
                        <!-- <button class="active address-type" value="home" >Home</button>
                        <button class="address-type" value="work">Work</button>
                        <button class="address-type" value="">
                            Other (Text Input)
                            <input type="text" value="" placeholder="Other (Text Input)" name="address-label"/>
                        </button> -->

                        <!-- <input type="radio" name="address-type" id="home" value="home" class="address-type"/>
                        <label for="home">Home</label>

                        <input type="radio" name="address-type" id="work" value="work" class="address-type"/>
                        <label for="work">Work</label>

                        <input type="radio" name="address-type" id="other" value="other" class="address-type"/>
                        <label for="other">Other</label> -->                        
                    </div>

                    <div class="form-group">
                        <label for="address_name">Address Name *</label>
                        <input type="text" placeholder="" value="" name="address_name" id="address_name"  />
                        <span class="p-correct" id="am-name-valid">Please enter only alphabets - [A- Z, a - z]</span>
                    </div>

                    <!-- <div class="form-group">
                        <label for="company_name">Company Name *</label>
                        <input type="text" placeholder="" value="" name="company_name" id="company_name"  />
                        <span class="p-correct" id="am-company-valid">Please enter only alphabets - [A- Z, a - z]</span>
                    </div> -->

                    <div class="form-group">
                        <label for="address_line_1">Line 1 *</label>
                        <input type="text" placeholder="" value="" name="address_line_1" id="address_line_1"  />
                        <span class="p-correct" id="am-line1-valid">Please enter the address info</span>
                    </div>

                    <div class="form-group">
                        <label for="address_line_2">Line 2 *</label>
                        <input type="text" placeholder="" value="" name="address_line_2" id="address_line_2"  />
                        <span class="p-correct" id="am-line2-valid">Please enter the address info</span>
                    </div>

                    <!-- <div class="form-group">
                        <label for="address">Address *</label>
                        <input type="text" placeholder="" value="" name="address" id="address" required>
                    </div> -->


                    <div class="row form-group">
                        <div class="form-group col-12 col-md-6 city-div">
                            <label for="city">City *</label>
                            <input type="text" placeholder="" value="" name="city" id="city"  />
                            <span class="p-correct" id="am-city-valid">Please enter only alphabets - [A- Z, a - z]</span>
                        </div>

                        
                        <div class="form-group col-12 col-md-6 postal-div" >
                            <label for="postal_code">Pincode </label>
                            <input type="number" placeholder="" value="" name="postal_code" id="postal_code"  />
                            <span class="p-correct" id="am-pincode-valid">Please enter valid pincode</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="state">State *</label>
                        <!-- <input type="text" placeholder="" value="" name="state" id="state" /> -->
                        <select class="form-control" id="state" name="state">
                            <option value="">Select State</option>
                            <?php
                            if (is_array($state_list)) {
                                foreach ($state_list as $state) {
                                    $countryId = $state['country_id'];
                                    $selected = isset($postdata['billing_state']) && $postdata['billing_state'] == ($state['name'] . '~' . $state['code']) ? 'selected' : '';
                                    echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . ' data-country-id="' . $countryId . '">' . $state['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <span class="p-correct" id="am-state-valid">Please select state</span>
                    </div>
                    <!-- <?php
                                    $country = $this->data['country'];
                                    var_dump($this->data['country']);
                                    if (is_array($country)) {
                                        foreach ($country as $countrycode) {
                                            $countryName = $countrycode->name;
                                            $codeValue = $countrycode->code;
                                            var_dump($countrycode->postal_code);

                                            // echo '<option id="' . $codeValue . '" value="' . $codeValue . ''-'' . $countryName . '" ' . $selected . '>' . $codeValue . '</option>';
                                        // echo '<option id="' . $codeValue . '" value="' . $codeValue . '-' . $countryName . '" ' . $selected . '>' . $codeValue . '</option>';

                                        }
                                    }
                                ?> -->

                    <div class="form-group">
                        <label for="country">Country *</label>
                        <!-- <div class="am-country"> -->
                            <!-- <select autocomplete="on" class="" id="country-code" name="country-code">
                                <?php
                                    $country = $this->data['country'];
                                    if (is_array($country)) {
                                        foreach ($country as $countrycode) {
                                            var_dump($countrycode);
                                            $countryName = $countrycode->name;
                                            $codeValue = $countrycode->code;
                                            // echo '<option id="' . $codeValue . '" value="' . $codeValue . '" countryName="' . $countryName . '" ' . $selected . '>'. $countryName . ' (' . $codeValue . ')</option>';   
                                        }
                                    }
                                ?>
                            </select>                       -->
                            <select autocomplete="on" class="" id="country" name="country" >
                                <?php
                                    $country = $this->data['country'];
                                    if (is_array($country)) {
                                        foreach ($country as $countrycode) {
                                            $hasPostaCode = $countrycode->postal_code == '1' ? "true" : "false";
                                            $phoneDigits = $countrycode->phone_digits;
                                            $countryId = $countrycode->id;

                                            $value = $countrycode->name;
                                            // echo '<option id="' . $codeValue . '" value="' . $codeValue . '" countryName="' . $countryName . '" ' . $selected . ' haspostalCode="' . $hasPostaCode . '" >' . $countryName . ' (' . $codeValue . ')</option>';
                                            // echo '<option id="' . $value . '" value="' . $value . '" ' . $selected . 'haspostalCode="' . $hasPostaCode . '" phoneDigits"' . $phoneDigits'">' . $countrycode->name . '</option>';
                                       echo '<option id="' . $value . '" value="' . $value . '" ' . $selected . ' haspostalCode="' . $hasPostaCode . '" phoneDigits="' . $phoneDigits . '" data-country-id="' . $countryId . '">' . $countrycode->name . '</option>';

                                        } 
                                    }
                                ?>
                            </select>
                        <!-- </div> -->
                        <span class="p-correct" id="am-country-valid">Please enter correct country value</span>       
                    </div>
                   


                    <div class="form-group">
                        <label for="phone">Contact number *</label>
                        <div class="am-country">
                            <select autocomplete="on" class="" id="country-code" name="country-code">
                                <?php
                                    $country = $this->data['country'];
                                    if (is_array($country)) {
                                        foreach ($country as $countrycode) {
                                            $hasPostalCode = $countrycode->postal_code == '1' ? "true" : "false";
                                            $countryName = $countrycode->name;
                                            $codeValue = $countrycode->code;
                                        //    echo '<option id="' . $codeValue . '" value="' . $codeValue . '" countryName="' . $countryName . '" ' . $selected . ' haspostalCode="' . $hasPostaCode . '" >' . $countryName . ' (' . $codeValue . ')</option>';
echo '<option id="' . $codeValue . '" value="' . $codeValue . '" countryName="' . $countryName . '" ' . $selected . ' hasPostalCode="' . $hasPostalCode . '" >' . $countryName . ' (' . $codeValue . ')</option>';

                                            // echo '<option id="' . $codeValue . '" value="' . $codeValue . '" countryName="' . $countryName . '" ' . $selected . ' hasPostalCode='" . $hasPostalCode " ' >'. $countryName . ' (' . $codeValue . ')</option>';   
                                        }
                                    }
                                ?>
                            </select> 

                            <div>
                                <input type="number" placeholder="" value="" name="phone" id="phone" />
                            </div>
                        </div>
                        <!-- <input type="number" placeholder="" value="" name="phone" id="phone" /> -->
                        <span class="p-correct" id="am-phone-valid">Please enter a valid contact number.</span>
                    </div>

                    <div class="form-group">
                        <label for="email_id">Email</label>
                        <input type="email" placeholder="" value="" name="email_id" id="email_id" />
                        <span class="p-correct" id="am-email-valid">Please enter correct email format</span>
                    </div>  
                    <div class="checkbox-group d-flex justify-content-center align-items-center pt-2">
                        <input type="checkbox" id="default_address" name="default_aadress" >
                        <label for="default_address">Mark as default address</label>
                    </div>

                    <input type="hidden" value="edit" id="addressModalAction" name="addressModalAction"/>
                    <input type="hidden" value="" id="customer_id" name="customer_id"/>
                    <input type="hidden" value="" id="address_id" name="address_id"/>

                    <!-- <input type="hidden" value="" id="submit_address" name="submit_address"/> -->
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" value="Submit" class="btn save-address-btn" id="manage-address" >Save changes</button>
            </div>
        </div>
    </div>
</form>