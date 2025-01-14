<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Danh sách Khách hàng</title>
    <link href="style1.css" rel="stylesheet" type="text/css"/>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        .margin-bottom {
            margin-bottom: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        th, td {
            text-align: center;
            padding: 16px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a.blink {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a.blink:hover {
            color: #ff4500;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="content">
            <h1>Danh sách Khách hàng</h1>

            <table class="center margin-bottom" width="1000" border="1">
                <thead>
                    <tr>
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tỉnh thành phố</th>
                        <th>Quận huyện</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data["data"]): ?>
                        <?php foreach ($data["data"] as $r): ?>
                            <tr>
                                <td><?php echo ($r["ma_khachhang"]); ?></td>
                                <td><?php echo ($r["tenkhachhang"]); ?></td>
                                <td><?php echo ($r["phone"]); ?></td>
                                <td><?php echo ($r["email"]); ?></td>
                                <td><?php echo ($r["tinhthanhpho"]); ?></td>
                                <td><?php echo ($r["quanhuyen"]); ?></td>
                                <td><?php echo ($r["diachigiaohang"]); ?></td>
                                <td>
                                    <a href="./update1/<?php echo $r['ma_khachhang']; ?>" class="blink">Sửa</a>
                                </td>
                                <td>
                                    <a href="./delete1/<?php echo $r['ma_khachhang']; ?>" class="blink"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" style="text-align: center;">Không có dữ liệu</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
