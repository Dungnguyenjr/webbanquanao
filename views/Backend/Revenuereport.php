<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* CSS styles */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .center-button {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .info-box {
            width: 45%;
            padding: 20px;
            margin: 2%;
            box-sizing: border-box;
            text-align: center;
            color: #FFF; /* Chữ trắng */
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(255, 255, 255, 0.1);
            background-color: #90F; /* Màu nền tím nhạt */
            transition: background-color 0.5s ease;
        }

        .info-box:hover {
            background-color: #7CF; /* Hiệu ứng màu sáng hơn khi hover */
        }

        h2 {
            color: #FFF; /* Chữ tiêu đề trắng */
        }

        p {
            margin: 10px 0;
        }

        button {
            padding: 10px;
            background-color: #FFF;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }

        button:hover {
            background-color: #90F;
        }

        .button-group {
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
        $obj = new Report;
   // Lấy dữ liệu từ mảng "data"
    $totalQuantity = $data["data"]["totalQuantity"];
    $totalCanceledOrders = $data["data"]["totalCanceledOrders"];
    $totalOrders = $data["data"]["totalOrders"];
    $totalRevenue = $data["data"]["totalRevenue"];

    // var_dump($data);
  

    ?>
    <!-- Info Box 1 -->
    <div class="info-box">
        <h2>ĐƠN HÀNG THÀNH CÔNG</h2>
        <p><?php echo $totalQuantity; ?></p>
        <p>Đơn hàng giao dịch thành công</p>
    </div>

    <div class="info-box">
        <h2>ĐANG XỬ LÝ</h2>
        <p><?php echo $totalOrders; ?></p>
        <p>Số lượng đơn hàng đang xử lý</p>
    </div>

    <div class="info-box">
        <h2>DOANH SỐ</h2>
        <p><?php echo $totalRevenue; ?></p>
        <p>Doanh số hệ thống</p>
    </div>

    <div class="info-box">
        <h2>ĐƠN HÀNG HỦY</h2>
        <p><?php echo $totalCanceledOrders; ?></p>
        <p>Số đơn bị hủy trong hệ thống</p>
    </div>
</div>

<div class="button-group">
    <!-- Button Group 1 -->
    <h3>Tổng đơn hàng đã bán thành công</h3>
    <a href="<?php echo BASE_URL;?>Report/chart"><button>Xem chi tiết</button></a>
    <a href="<?php echo BASE_URL;?>Report/detailsofsuccess"><button>Xem Lịch sử thành công</button></a>
</div>

<div class="button-group">
    <!-- Button Group 2 -->
    <h3>Tổng số hàng đã hủy</h3>
    <a href="<?php echo BASE_URL;?>Report/chartfailed"><button>Xem chi tiết</button></a>
    <a href="<?php echo BASE_URL;?>Report/detailsoffail"><button>Xem Lịch sử đơn hàng bị hủy</button></a>
</div>
</body>
</html>
