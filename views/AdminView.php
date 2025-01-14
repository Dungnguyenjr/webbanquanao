<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị người dùng</title>
    <link href="<?php echo BASE_URL;?>/public/styleAdmin.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/images" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="hello-admin">
                <span class="greeting-icon">👋</span>
                <p class="greeting-text">Hello Admin! Welcome back</p>
            </div>
            <?php 
                require_once "./views/pages/Menu_backendView.php";
            ?>
        </div>
        <div class="content">
            <?php
                require_once "./views/Backend/".$data["page"].".php";
            ?>
        </div>
    </div>
</body>
</html>
