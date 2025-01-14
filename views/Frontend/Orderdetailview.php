<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        table {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid darkviolet;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #00BBA6;
        }
        h2 {
            text-align: center;
            color: #00BBA6;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #00BBA6;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="content">
            <h1>Chi Tiết Đơn Hàng</h1>

            <!-- Thông tin khách hàng -->
            <h2>Thông Tin Khách Hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã Khách Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Tỉnh Thành Phố</th>
                        <th>Quận Huyện</th>
                        <th>Địa Chỉ Giao Hàng</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $data['data1']['ma_khachhang']; ?></td>
                            <td><?php echo $data['data1']['tenkhachhang']; ?></td>
                            <td><?php echo $data['data1']['phone']; ?></td>
                            <td><?php echo $data['data1']['email']; ?></td>
                            <td><?php echo $data['data1']['tinhthanhpho']; ?></td>
                            <td><?php echo $data['data1']['quanhuyen']; ?></td>
                            <td><?php echo $data['data1']['diachigiaohang']; ?></td>
                        </tr>
                </tbody>
            </table>

            <!-- Chi tiết sản phẩm -->
            <h2>Chi Tiết Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Hình Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                 
                   <?php foreach($data['data3'] as $v) {?>
                        <tr>
                            <td><?php echo $v['Ma_sp']; ?></td>
                            <td><?php echo $v['Tensp']; ?></td>
                            <td><?php echo $v['soluong']; ?></td>
                            <td><?php echo number_format($v['giaxuat'], 0, '', ' ') . " VND"; ?></td>
                            <td><img src="<?= BASE_URL ?>/public/images/<?= $v['hinhanh']; ?>" alt="Product Image" width="100"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Thông tin đơn hàng -->
            <h2>Thông Tin Đơn Hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
            
                        <tr>
                            <td><?php echo $data['data2']['Ma_hoadon']; ?></td>
                            <td><?php echo $data['data2']['tenkhachhang']; ?></td>
                            <td><?php echo number_format($data['data2']['tongtien'], 0, '', ' ') . " VND"; ?></td>
                            <td><?php echo $data['data2']['createdate']; ?></td>
                            <td><?php echo $data['data2']['trangthai']; ?></td>
                        </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
