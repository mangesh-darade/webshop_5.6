<!-- HTML -->
<html lang="en" webcrx="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Herbinn Micro Medicines</title>
    <meta name="description" content="Get in touch with Herbinn Micro Medicines">
    <link rel="canonical" href="https://herbinnmicromedicines.elintpos.in/webshop/contact_us">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Oxygen:700" rel="stylesheet"
        type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=210616_01" rel="stylesheet" media="screen"
        charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/print.css" rel="stylesheet" type="text/css" media="print"
        charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css"
        media="screen" charset="utf-8">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/contact_us.css">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
</head>

<body class="" style="top: 101px;">
    <?php include_once('header.php'); ?>

    <div class="main ">
        <div class="container">
            <div class="main-row">
                <div class="main-content contact-us" style="padding:20px 0;">
                    <h2>Contact Us</h2>
                    <p>We'd love to hear from you. Please fill out the form below and we'll get back to you as soon as possible.</p>

                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('webshop/submit_contact') ?>" method="post" class="contact-form">
                        <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                        <div class="row g-4 mt-3 mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>" required>
                                <?php if(form_error('name')): ?>
                                    <span class="text-danger small"><?= form_error('name') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required>
                                <?php if(form_error('email')): ?>
                                    <span class="text-danger small"><?= form_error('email') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" inputmode="numeric" pattern="[0-9]{9,10}" maxlength="10" minlength="9" placeholder="Enter mobile number" value="<?= set_value('phone') ?>">
                                <?php if(form_error('phone')): ?>
                                    <span class="text-danger small"><?= form_error('phone') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <input type="text" name="subject" id="subject" class="form-control" value="<?= set_value('subject') ?>" required>
                                <?php if(form_error('subject')): ?>
                                    <span class="text-danger small"><?= form_error('subject') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea name="message" id="message" rows="5" class="form-control" required><?= set_value('message') ?></textarea>
                                <?php if(form_error('message')): ?>
                                    <span class="text-danger small"><?= form_error('message') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-12" >
                                <button type="submit" class="btn btn-primary" style="margin: 2% 0% 0% 0%;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="<?= $assets ?>nw_theme/js/main.js?ver=200406"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.magnific-popup-new.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/welcome-message.js?ver=221017_01"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/contact_us.js"></script>
    <script>
        jQuery(function () {
            jQuery.scrollDepth();
        });
    </script>
</body>

</html>