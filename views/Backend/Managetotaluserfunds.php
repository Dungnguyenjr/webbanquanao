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
                    <th>Số Lượng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Thành Tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
            <?php
$totalAmount = 0; // Khởi tạo biến tổng tiền

if (isset($data) && is_array($data['data']) && !empty($data['data'])) { 
    foreach ($data['data'] as $r) { 
        if (is_array($r) && isset($r['tongtien'])) {
            $totalAmount += $r['tongtien']; // Cộng dồn tổng tiền
        }
    }
}
?>

<tbody>
<?php if (isset($data) && is_array($data['data']) && !empty($data['data'])) { 
    foreach ($data['data'] as $r) { 
        if (is_array($r)) { 
            ?>
            <tr>
                <td><?= isset($r["ma_hoadon"]) ? ($r["ma_hoadon"]) : 'N/A'; ?></td>
                <td><?= isset($r["ma_khachhang"]) ? ($r["ma_khachhang"]) : 'N/A'; ?></td>
                <td><?= isset($r["tenkhachhang"]) ? ($r["tenkhachhang"]) : 'N/A'; ?></td>
                <td><?= isset($r["soluong"]) ? ($r["soluong"]) : 'N/A'; ?></td>
                <td><?= isset($r["phone"]) ? ($r["phone"]) : 'N/A'; ?></td>
                <td><?= isset($r["email"]) ? ($r["email"]) : 'N/A'; ?></td>
                <td><?= isset($r['tongtien']) ? number_format($r['tongtien'], 0, ',', '.') . ' VND' : 'N/A'; ?></td>
                <td><?= isset($r["trangthai"]) ? ($r["trangthai"]) : 'N/A'; ?></td>
            </tr>
            <?php 
        }
    } 
    ?>
    <tr>
        <td colspan="6" style="text-align: right; font-weight: bold;">Tổng Tiền:</td>
        <td><?= number_format($totalAmount, 0, ',', '.') . ' VND'; ?></td>
        <td></td>
    </tr>
<?php 
} else {
    echo "<tr><td colspan='8'>Không có dữ liệu mua hàng</td></tr>";
} ?>

</tbody>
        </table>
    </div>
</body>
</html>
