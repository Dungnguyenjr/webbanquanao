<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="<?php echo BASE_URL;?>/public/styleUser.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/images" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap'">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/css/grid.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/base.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/responsive.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/grid.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/header.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/bootstrapmin.css" >
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/bundle.css" > -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/plugin.css" >
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/responsive.css" >
    

</head>
<body>
    <div class="main">
    <!-- <i class="fa-regular fa-cart-shopping"></i> -->
        <div class="header">
            <?php 
                require_once "./views/pages/Menu_FrontendView.php";
            ?>
        </div>
        <div class="content">
            <?php
                require_once "./views/Frontend/".$data["page"].".php";
                // require_once "./views/Control/".$data["page"].".php";
            ?>
        </div>
    </div>
</body>

    <!-- Footer Section -->
<div class="footer_area">
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright_area">
                        <ul>
                        <div class="footer_widget_contect">
                            <p><i class="fa fa-map-marker"></i> Trường đại học lao động và xã hội</p>
                            <p><i class="fa fa-mobile"></i> 0983775973</p>
                            <a href="#"><i class="fa fa-envelope-o"></i> ngvietdung23k1@gmail.com</a>
                        </div>
                        </ul>
                        <p>&copy; 2024 <a href="#">Về đầu trang</a>. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal Area End -->

</html>
