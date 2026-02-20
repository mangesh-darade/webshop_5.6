<div id="order-details-div" style="display:none">
    <button class="od-btn" id="od-btn">
        <span>
            <img src=<?= $assets . 'restaurant/img/back_arrow.svg'; ?> alt="back-arrow-image" />
            <span>
            </span>ORDER DETAILS</span>
    </button>
    <div class="order-detail-div1">
        <div class="od-strip">
            <div>
                <p class="order-reference-no p-2" id="order-reference-no">#96459761</p>
                <div class="ods-2 p-2">
                    <span class="" id="order-total-products">4 Products </span>
                    <span>.</span>
                    <span id="order-date-time"> Order Placed June 30, 2025 at 7:52 PM</span>
                </div>
            </div>
            <div class="od-order-total" id="od-order-total">$80.00</div>
        </div>

        <div class="od-track">
            <div id="order-tracking-div">

                <p id="order-status"><span id="order-status-symbol"></span>Order <span id="status"></span>

                <div id="tracker-container">
                    <div id="tracking-image">
                        <div class="img-div">
                            <div class="circle not-done receivedCircle" id="receivedCircle">✓</div>
                            <div class="strip">
                                <div class="inner-strip not-done receivedStrip" id="receivedStrip"></div>
                            </div>
                        </div>
                        <div class="img-div">
                            <div class="circle not-done inprogressCircle" id="inprogressCircle">✓</div>
                            <div class="strip">
                                <div class="inner-strip not-done inprogressStrip" id="inprogressStrip"></div>
                            </div>
                        </div>
                        <div class="img-div">
                            <div class="circle not-done foodreadyCircle" id="foodreadyCircle">✓</div>
                            <div class="strip">
                                <div class="inner-strip not-done foodreadyStrip" id="foodreadyStrip"></div>
                            </div>
                        </div>
                        <div class="img-div">
                            <div class="circle not-done dispatchedCircle" id="dispatchedCircle">✓</div>
                            <div class="strip">
                                <div class="inner-strip not-done dispatchedStrip" id="dispatchedStrip"></div>
                            </div>
                        </div>
                        <div class="img-div">
                            <div class="circle not-done deliveredCircle" id="deliveredCircle">✓</div>
                        </div>
                    </div>
                    <div id="status-data">
                        <div class="status-div">
                            <p class="status-name">Received</p>
                        </div>
                        <div class="status-div">
                            <p class="status-name">Preparing</p>
                            <!-- <p class="status-time"></p>
                        <p class="status-date"></p> -->
                        </div>
                        <div class="status-div">
                            <p class="status-name">Ready</p>
                            <!-- <p class="status-time"></p>
                        <p class="status-date"></p> -->
                        </div>
                        <div class="status-div">
                            <p class="status-name">En Route</p>
                            <!-- <p class="status-time"></p>
                        <p class="status-date"></p> -->
                        </div>
                        <div class="status-div">
                            <p class="status-name">Delivered</p>
                            <!-- <p class="status-time"></p>
                        <p class="status-date"></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-detail-div2">
        <table id="od-table">
            <thead>
                <tr>
                    <td>PRODUCTS</td>
                    <td>PRICE</td>
                    <td>QUANTITY</td>
                    <td>SUB-TOTAL</td>
                </tr>
            </thead>
            <tbody id="od-tbody">
                <!-- <tr>
                    <td class="od-td">
                        <img src="<?php echo ($assets . 'restaurant/img/dummy_product.svg'); ?>" alt="product-image" />
                        <div>
                            <p class="product-name m-0">Mini Tiffin 1</p>
                            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Dolor sit amet consectetur...</p>
                        </div>
                    </td>
                    <td>$14</td>
                    <td>x3</td>
                    <td class="product-subtotal">$42</td>
                </tr>

                <tr>
                    <td class="od-td">
                        <img src="<?php echo ($assets . 'restaurant/img/dummy_product.svg'); ?>" alt="product-image" />
                        <div>
                            <p class="product-name m-0">Mini Tiffin 1</p>
                            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Dolor sit amet consectetur...</p>
                        </div>
                    </td>
                    <td>$14</td>
                    <td>x3</td>
                    <td class="product-subtotal">$42</td>
                </tr> -->
            </tbody>
        </table>
    </div>
    <div class="order-detail-div3">
        <div class="od-billing-address" id="od-billing-address">
            <p class="a-t-heading">Billing Address</p>
            <div id='od-ba-in' class="addr-value">
                <p>Mehrab Bozorgi</p>
                <p>Flat 204, Al Fahidi Heights, Near Al Fahidi Metro Station, Bur Dubai, Dubai, UAE
                    Zip: 6755</p>
                <p>Phone Number: (+971) 9788 978</p>
            </div>
        </div>
        <div class="od-shipping-address" id="od-shipping-address">
            <p class="a-t-heading">Shippping Address</p>
            <div id="od-sa-in" class="addr-value">
                <p>Mehrab Bozorgi</p>
                <p>Flat 204, Al Fahidi Heights, Near Al Fahidi Metro Station, Bur Dubai, Dubai, UAE
                    Zip: 6755</p>
                <p>Phone Number: (+971) 9788 978</p>
            </div>
        </div>
        <!-- <div class="od-order-notes" id="od-order-notes">
            <h5>Order Notes</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Dolor sit amet consectetur adipiscing elit quisque faucibus.</p>
        </div> -->

    </div>
</div>