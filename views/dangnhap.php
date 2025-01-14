<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>website bán hàng</title>
    <link href="<?php echo BASE_URL;?>/public/style2.css" rel="stylesheet">
</head>
<body>
<div class="header">
            <?php 
                // require_once "./views/pages/Menu_FrontendView.php";
                // session_start(); // Bắt đầu session
            ?>
        </div>
        <div class="content">
            <?php
                require_once "./views/Control/".$data["page"].".php";
            ?>
        </div>
</body>
</html>