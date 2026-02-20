<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Order Tracking</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Meenatshi Chettinadu Restaurant">
    <meta name="keywords" content="Meenatshi Chettinadu Restaurant" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
       Google Web Fonts
    ============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    <!--==============================
        All CSS File
    ============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">

    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/tracking_order.css">

</head>

<body>

    <?php include_once('header.php'); ?>

    <div class="container-order">
        <div id="order-heading-div">
            <p class="order-number-div">Order <span id="order-number"></span></p>
            <p class="date" id="order-date">May 15, 2025 <span id="order_time"></span></p>
        </div>

        <div id="order-tracking-div">

            <p id="order-status"><span id="order-status-symbol"></span>Order <span id="status"></span>

            <div id="tracker-container">
                <div id="tracking-image">
                    <div class="img-div">
                        <div class="circle not-done" id="receivedCircle">✓</div>
                        <div class="strip">
                            <div class="inner-strip not-done" id="receivedStrip"></div>
                        </div>
                    </div>
                    <div class="img-div">
                        <div class="circle not-done" id="inprogressCircle">✓</div>
                        <div class="strip">
                            <div class="inner-strip not-done" id="inprogressStrip"></div>
                        </div>
                    </div>
                    <div class="img-div">
                        <div class="circle not-done" id="readyCircle">✓</div>
                        <div class="strip">
                            <div class="inner-strip not-done" id="readyStrip"></div>
                        </div>
                    </div>
                    <div class="img-div">
                        <div class="circle not-done" id="dispatchedCircle">✓</div>
                        <div class="strip">
                            <div class="inner-strip not-done" id="dispatchedStrip"></div>
                        </div>
                    </div>
                    <div class="img-div">
                        <div class="circle not-done" id="deliveredCircle">✓</div>
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

            <div id="delivery-details-div">
                <span style="padding : 0% 3% 0% 0%"><strong>Deliver to : </strong><span id="deliver_to">Loading.....</span></span>
            </div>
        </div>

        <div id="order-items-div">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody id="orderItems-body">
                    <!-- <tr>
                        <td>Idly vada</td>
                        <td>2</td>
                        <td>د.إ 50</td>
                        <td>د.إ 100</td>
                    </tr>   -->
                </tbody>
            </table>


        </div>

        <div id="section-order">

            <p>Order Subtotal: <span id="orderSubTotal"></span>د.إ</p>

            <p>Delivery Fee:<span id="delivery-fees">0</span> د.إ </p>

            <p>Tax: د.إ 0 </p>

            <p>Order Total: <span id="orderTotal"></span>د.إ </p>

        </div>
        <div id="view-btn">
            <button class="btn" id="view-order-btn"><span id="toggle-order-detail">View</span> Order Details</button>
        </div>

    </div>

    <?php include_once('footer.php'); ?>

    <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme">
        <i class="far fa-angle-up"></i>
    </a>

    <script src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <script src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/main.js"></script>
    <script src="<?= $assets ?>restaurant/js/checkout.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/tracking_order.js"></script>

    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        let intervalId = "";
        const orderStatuses = ["received", "inprogress", "ready", "dispatched", "delivered"];
        const iconElement = document.getElementById("order-status-symbol");
        const orderNumber = document.getElementById("order-number");
        const orderStatus = document.getElementById("status");
        const orderDate = document.getElementById("order-date");
        const orderTime = document.getElementById("order-time");
        const toggleElement = document.getElementById("toggle-order-detail");
        const deliverToElement = document.getElementById("deliver_to");

        function renderTrackingBar(data, intervalId) {
            let orderData = data.order;
            let orderItems = data.order_items;
            let saleStatus = data.order.sale_status.toLowerCase().trim().replace(/\s+/g, '');
            let datetime = data.order.date;
            let [date, time] = datetime.split(' ');
            date = new Date(date);
            const day = date.getDate();
            const month = date.toLocaleString('default', {
                month: 'long'
            });
            const year = date.getFullYear();

            date = `${month} ${day}, ${year}`;
            // console.log(date);     
            renderIcon(saleStatus);
            showOrderStatus(saleStatus);
            updateOrderTime(time);

            for (let i = 0; i < orderStatuses.length; i++) {

                if (saleStatus == orderStatuses[i]) {

                    if (i == orderStatuses.length - 1) {
                        document.getElementById(`${saleStatus}Circle`).classList.add("done");
                        document.getElementById(`${saleStatus}Circle`).classList.remove("not-done");
                        clearInterval(intervalId);
                        break;
                    }
                    document.getElementById(`${saleStatus}Circle`).classList.add("done");
                    document.getElementById(`${saleStatus}Circle`).classList.remove("not-done")
                    document.getElementById(`${saleStatus}Strip`).classList.add("done");
                    document.getElementById(`${saleStatus}Strip`).classList.remove("not-done");
                    break;
                }
                document.getElementById(`${orderStatuses[i]}Circle`).classList.add("done");
                document.getElementById(`${orderStatuses[i]}Circle`).classList.remove("not-done");
                document.getElementById(`${orderStatuses[i]}Strip`).classList.add("done");
                document.getElementById(`${orderStatuses[i]}Strip`).classList.remove("not-done");
            }
        }

        function updateTrackingBar(data, intervalId) {
            let orderData = data.order;
            let orderItems = data.order_items;
            let saleStatus = orderData.sale_status.toLowerCase().str.trim().split(/\\s+/).join();
            // let datetime = data.order.updated_at;
            // let [date, time] = datetime.split(' ');

            renderIcon(saleStatus);
            showOrderStatus(saleStatus);
            if (saleStatus == "delivered") {
                document.getElementById(`${saleStatus}Circle`).classList.add("done");
                document.getElementById(`${saleStatus}Circle`).classList.remove("not-done");
                clearInterval(intervalId);
                return;
            }
            document.getElementById(`${saleStatus}Circle`).classList.add("done");
            document.getElementById(`${saleStatus}Circle`).classList.remove("not-done");
            document.getElementById(`${saleStatus}Strip`).classList.add("done");
            document.getElementById(`${saleStatus}Strip`).classList.remove("not-done");
            return;
        }

        function populateOrderItems(data) {
            const orderBody = document.getElementById("orderItems-body");
            orderBody.innerHTML = `<h3>Loading......</h3>`
            let orderItems = data.order_items;

            if (orderItems.length) {
                orderBody.innerHTML = orderItems.map((item, idx) => {
                    return `
                        <tr>
                            <td>${item.product_name}</td>
                            <td>${Number(item.quantity).toFixed(2)}</td>
                            <td>${Number(item.unit_price).toFixed(2)} د.إ</td>
                            <td>${(item.quantity * item.unit_price).toFixed(2)} د.إ</td>
                        </tr>                    
                    `;
                }).join('');
            } else {
                orderBody.innerHTML = `<h3>There are no ordered items.</h3>`;
            }
        }

        function populateOrderTotal(data) {
            const subTotalElement = document.getElementById("orderSubTotal");
            const totalElement = document.getElementById("orderTotal");
            const deliveryFeesElement = document.getElementById('delivery-fees');
            let deliveryFees ;
            if (data.order) {
                deliveryFees = Number(data.order.shipping);
                subTotalElement.textContent = Number(data.order.total).toFixed(2);
                deliveryFeesElement.textContent = Number(deliveryFees).toFixed(2);
                totalElement.textContent = Number(data.order.grand_total).toFixed(2);
            }
        }

        function renderIcon(saleStatus) {
            // if(saleStatus == "received"){
            iconElement.innerHTML = `<img src="<?= $assets ?>restaurant/img/${saleStatus}.svg" alt="webshop order ${saleStatus} image">`;
            // }else if(saleStatus == "inprogress"){
            //     iconElement.innerHTML = `<img src="<?= $assets ?>restaurant/img/${saleStatus}" alt="${saleStatus} image">`;
            // }else if(saleStatus == "ready"){
            //     iconElement.innerHTML = `<img src="<?= $assets ?>restaurant/img/${saleStatus}" alt="${saleStatus} image">`;
            // }else if(saleStatus == "dispatched"){
            //     iconElement.innerHTML = `<img src="<?= $assets ?>restaurant/img/${saleStatus}" alt="${saleStatus} image">`;
            // }else if(saleStatus == "delivered"){
            //     iconElement.innerHTML = `<img src="<?= $assets ?>restaurant/img/${saleStatus}" alt="${saleStatus} image">`;
            // }
        }

        function showOrderStatus(sale_status) {
            // console.log("salealesalesale", sale_status);
            sale_status = sale_status.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()).join(' ');
            if (sale_status === "Inprogress") {
                sale_status = "In Progress";
            }
            orderStatus.textContent = sale_status;
        }

        function fetchTrackingData(orderId) {
            return $.ajax({
                url: '<?= base_url("webshop/getTrackingData") ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    order_id: orderId,
                    '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
                }
            }).then(function(res) {
                if (res.status === 'success') {
                    return res.tracking;
                } else {
                    return Promise.reject(res.message || 'Tracking failed');
                }
            }).catch(function(error) {
                return Promise.reject(error);
            });
        }
        // 6512bd43d9caa6e02c990b0a82652dca
        const orderId = <?= json_encode($this->data['order_id']); ?>;
        const orderData = fetchTrackingData(orderId);
        orderData.then((data) => {
            console.log("data", data);
            if (data.order) {
                orderNumber.textContent = `#${data.order.id}`;
                renderTrackingBar(data, intervalId);
                populateOrderItems(data);
                populateOrderTotal(data);
                deliverToElement.textContent = data.order.deliver_to;
            }
        });

        intervalId = setInterval(() => {
            const orderData = fetchTrackingData(orderId);
            orderData.then((data) => {
                // console.log("data", data);
                if (data.orders) {
                    updateTrackingBar(data, intervalId);
                }
            });
        }, 5000);

        const orderItemsDiv = document.getElementById("order-items-div");
        const viewOrderButton = document.getElementById("view-order-btn");

        viewOrderButton.addEventListener("click", (e) => {
            // console.log(orderItemsDiv.style.display, "styleeeee");
            if (orderItemsDiv.style.display === "none") {
                orderItemsDiv.style.display = "block";
                toggleElement.textContent = "Close";
                return;
            }
            orderItemsDiv.style.display = "none";
            toggleElement.textContent = "View";
        });

        function updateOrderTime(time) {
            let [hour, minute] = time.split(":");
            hour = parseInt(hour);
            let ampm = hour >= 12 ? 'PM' : 'AM';
            hour = hour % 12;
            hour = hour ? hour : 12; // convert '0' hour to '12'
            let formattedTime12hr = `${hour}:${minute} ${ampm}`;
            document.getElementById("order_time").textContent = formattedTime12hr;
        }

        // function fetchData(orderId) {
        //     return $.ajax({
        //         url: `${baseUrl}/reciept/invoice_reciept`,
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {
        //             order_id: orderId,
        //             "<?= $this->security->get_csrf_token_name(); ?>": "<?= $this->security->get_csrf_hash(); ?>"
        //         }
        //     }).then(function(res) {
        //         if (res) {
        //             return res;
        //         } else {
        //             return Promise.reject(res);
        //         }
        //     }).catch(function(error) {
        //         return Promise.reject(error);
        //     });
        // }
        // fetchData(orderId).then(val => console.log(val)).catch(val => console.log(val));
    </script>

</body>

</html>