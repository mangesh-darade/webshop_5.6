<!-- HTML -->
<html lang="en" webcrx="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Herbinn Micro Medicines</title>
    <meta name="description"
        content="Established in the year 1994 we Herbinn Micro Medicines">
    <link rel="canonical" href="https://herbinnmicromedicines.elintpos.in/webshop">
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
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/about-us.css">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">

    <style>
        :root {
            --primary: #5e8b6f;
            --primary-dark: #4a6e57;
            --primary-light: #7ca68a;

            --dark: #0f172a;
            --text: #334155;
            --light: #f8fafc;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--light);
            line-height: 1.7;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 60px 20px;
        }

        /* ---------------- HERO ---------------- */
        .hero {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: #ffffff;
            padding: 100px 0 160px 0;
            position: relative;
            overflow: hidden;
            border-radius: 18px;
        }

        .hero .container {
            padding: 0 20px;
        }

        .hero-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-content {
            flex: 1.2;
            z-index: 2;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .hero p {
            font-size: 19px;
            margin-bottom: 32px;
            opacity: 0.9;
            max-width: 600px;
        }

        .hero-image {
            flex: 1;
            position: relative;
            z-index: 2;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 24px;
            box-shadow: 20px 20px 60px rgba(0, 0, 0, 0.3);
            border: 8px solid rgba(255, 255, 255, 0.1);
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: perspective(1000px) rotateY(0deg);
        }

        .hero-cta {
            display: flex;
            gap: 16px;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn-primary {
            background: #ffffff;
            color: var(--primary);
        }

        .btn-primary:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
        }

        /* Shape Divider */
        .hero-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .hero-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }

        .hero-divider .shape-fill {
            fill: var(--light);
        }

        /* ---------------- SECTION ---------------- */
        section {
            margin-bottom: 70px;
        }

        .section-title {
            display: block;
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 40px;
            position: relative;
        }

        .who-we-are-content .section-title {
            display: inline-block;
            text-align: left;
            margin-bottom: 30px;
        }

        /* ---------------- ABOUT HIGHLIGHT ---------------- */
        .about-highlight {
            background: #ffffff;
            border-left: 6px solid var(--primary);
            padding: 32px 36px;
            border-radius: 14px;
            max-width: 900px;
        }

        .about-highlight p {
            font-size: 17px;
        }

        /* ---------------- GRID CARDS ---------------- */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .card {
            background: #ffffff;
            padding: 34px;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-icon {
            color: var(--primary);
            background: #f1f6f3;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* ---------------- WHY CHOOSE ---------------- */
        .why-choose {
            background: var(--primary-dark);
            padding: 60px;
            border-radius: 30px;
            border: 1px solid var(--primary);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 90px;
        }

        .why-choose .section-title {
            color: #ffffff;
        }

        .why-choose .grid {
            grid-template-columns: repeat(2, 1fr);
        }

        /* ---------------- WHO WE ARE ---------------- */
        .who-we-are-layout {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .who-we-are-content {
            flex: 1;
        }

        .who-we-are-image {
            flex: 1;
        }

        .who-we-are-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 20px 20px 60px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease;
        }

        .who-we-are-image img:hover {
            transform: translateY(-10px);
        }

        .who-we-are-content p {
            font-size: 18px;
            line-height: 1.8;
            color: var(--text);
            margin-bottom: 20px;
        }

        /* ---------------- QUALITY ASSURANCE ---------------- */
        .qa-layout {
            display: flex;
            align-items: center;
            gap: 60px;
            background: #ffffff;
            padding: 50px;
            border-radius: 30px;
            border: 1px solid var(--primary);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        .qa-layout::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(94, 139, 111, 0.05) 0%, transparent 70%);
            border-radius: 50%;
        }

        .qa-content {
            flex: 1.2;
        }

        .qa-content p {
            font-size: 18px;
            color: var(--text);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .qa-image {
            flex: 1;
            position: relative;
        }

        .qa-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease;
        }

        .qa-image:hover img {
            transform: scale(1.03);
        }

        .qa-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #f1f6f3;
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .qa-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .qa-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: var(--dark);
        }

        .qa-feature i {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* ---------------- STATS ---------------- */
        .stats {
            background: #ffffff;
            padding: 60px;
            border-radius: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 36px;
            border: 1px solid var(--primary);
        }

        .stat {
            text-align: center;
        }

        .stat h2 {
            font-size: 42px;
            font-weight: 800;
            color: var(--primary);
        }

        .stat p {
            margin-top: 6px;
            font-weight: 500;
        }

        /* ---------------- LEADERS ---------------- */
        .leaders {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 36px;
        }

        .leader {
            background: #ffffff;
            padding: 36px;
            border-radius: 18px;
            border: 2px solid #92400e;
            /* Brown border */
            text-align: center;
            transition: transform 0.3s ease;
        }

        .leader:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(146, 64, 14, 0.1);
        }

        .leader img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .leader h3 {
            font-size: 20px;
            margin-bottom: 6px;
            color: var(--dark);
        }

        .leader span {
            font-size: 14px;
            color: #64748b;
        }

        /* ---------------- TESTIMONIALS ---------------- */
        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 28px;
        }

        .testimonial {
            background: #ffffff;
            padding: 34px;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        .testimonial p {
            font-style: italic;
        }

        .testimonial span {
            display: block;
            margin-top: 12px;
            font-weight: 600;
            color: var(--primary);
        }




        #back-to-top-btn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: var(--primary);
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #back-to-top-btn:hover {
            background-color: var(--primary-dark);
        }

        .primary-dark-section {
            background: var(--primary-dark);
            color: #ffffff;
            padding: 60px;
            border: 1px solid var(--primary);
            border-radius: 18px;
        }

        @media (max-width: 768px) {
            .primary-dark-section {
                padding: 40px 10px;
                border-radius: 0;
            }
        }

        /* ---------------- MOBILE ---------------- */
        @media (max-width: 768px) {
            .hero {
                padding: 80px 0 120px 0;
                border-radius: 0;
            }

            .hero h1 {
                font-size: 32px;
                text-align: center;
            }

            .hero p {
                font-size: 17px;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-wrapper {
                flex-direction: column;
                gap: 40px;
                text-align: center;
            }

            .hero-cta {
                justify-content: center;
            }

            .hero-image img {
                transform: none;
            }

            .hero-image:hover img {
                transform: none;
            }

            .container {
                padding: 40px 20px;
            }

            .section-title {
                font-size: 26px;
                margin-bottom: 30px;
            }

            .who-we-are-content .section-title {
                text-align: center;
                display: block;
            }

            .who-we-are-content {
                text-align: center;
            }

            .who-we-are-layout {
                flex-direction: column;
                gap: 30px;
            }

            .stats {
                padding: 40px 20px;
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .stat h2 {
                font-size: 32px;
            }

            .leaders {
                grid-template-columns: 1fr;
            }

            .qa-layout {
                flex-direction: column;
                padding: 30px 20px;
                gap: 40px;
            }

            .qa-content {
                text-align: center;
            }

            .qa-features {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .why-choose {
                padding: 40px 20px;
                border-radius: 0;
            }

            .why-choose .grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 24px;
            }

            .grid {
                gap: 20px;
            }

            #back-to-top-btn {
                bottom: 15px;
                right: 15px;
                padding: 12px;
                font-size: 14px;
            }
        }

        /* ---------------- ANIMATIONS ---------------- */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1.2s cubic-bezier(0.5, 0, 0, 1), transform 1.2s cubic-bezier(0.5, 0, 0, 1);
            will-change: opacity, transform;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>


</head>

<body class="" style="top: 101px;">
    <?php include_once('header.php') ?>
    <div class="main">
        <div class="container ab-con">
            <div class="main-row">
                <div class="main-content about-us">
                    <?=
                    $about_us->page_text ? $about_us->page_text : ''
                    ?>
                </div>


            </div>
        </div>
    </div>

    <?php include_once('footer.php') ?>
    <script src="<?= $assets ?>nw_theme/js/main.js?ver=200406"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.magnific-popup-new.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/welcome-message.js?ver=221017_01"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/about_us.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>
</body>

</html>