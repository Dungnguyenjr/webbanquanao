<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Đơn Hàng thành công</title>
    <style>
        .container {
            width: 100%;
            margin: 20px auto;
            padding-top: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }

        th {
            background-color: #7A2BC0;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        tr:hover {
            background-color: #e1bee7;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách Đơn Hàng</h1>
        <table>
            <thead>
                <tr>
                    <th>Mã Hóa Đơn</th>
                    <th>Mã Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số Lượng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tỉnh thành phố</th>
                    <th>Quận huyện</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Thành Tiền</th>
                    <th>Ngày Mua Hàng</th>
                    <th>Trạng thái</th>

                </tr>
            </thead>
            <tbody>
            <?php if ($data["data"]) { ?>
                <?php foreach ($data["data"] as $r) { ?>
                <tr>
                <td><?php echo ($r["ma_hoadon"]); ?></td>
                <td><?php echo ($r["ma_khachhang"]); ?></td>
                <td><?php echo ($r["tenkhachhang"]); ?></td>
                <td><?php echo ($r["ma_sp"]); ?></td>
                <td><?php echo ($r["tensp"]); ?></td>
                <td><?php echo ($r["soluong"]); ?></td>
                <td><?php echo ($r["phone"]); ?></td>
                <td><?php echo ($r["email"]); ?></td>
                <td><?php echo ($r["tinhthanhpho"]); ?></td>
                <td><?php echo ($r["quanhuyen"]); ?></td>
                <td><?php echo ($r["diachigiaohang"]); ?></td>
                <td><?php echo number_format($r['tongtien'], 0, ',', '.'); ?> VND</td>
                <td><?php echo ($r['createdate']); ?></td>
                <td><?php echo ($r["trangthai"]); ?></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
