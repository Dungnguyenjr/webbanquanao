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
        <h1>Danh sách Đơn Hàng đã dược đánh giá</h1>
        <table>
            <thead>
                <tr>
                    <th>Mã Hóa Đơn</th>
                    <th>Mã Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>tổng tiền</th>
                    <th>ngày mua hàng</th>
                    <th>Chất lượng</th>
                    <th>Bình luận</th>

                </tr>
            </thead>
            <tbody>
            <?php if ($data["data"]) { ?>
                <?php foreach ($data["data"] as $r) { ?>
                <tr>
                <td><?php echo ($r["ma_hoadon"]); ?></td>
                <td><?php echo ($r["ma_khachhang"]); ?></td>
                <td><?php echo ($r["tenkhachhang"]); ?></td>
                <td><?php echo ($r["tongtien"]); ?></td>
                <td><?php echo ($r["rating"]); ?></td>
                <td><?php echo ($r["comment"]); ?></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
