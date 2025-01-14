<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        .admin-table {
            width: 80%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .admin-table td {
            text-align: center;
        }

        .admin-table th {
            color: white;
            background-color: #90F;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Chi Tiết Đơn Hàng</h2>
<table class="admin-table">
    <thead>
        <tr align="center">
            <th>Mã Hóa Đơn</th>
            <th>Mã Khách Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ Giao Hàng</th>
            <th>Tổng Tiền</th>
            <th>Ngày Đặt</th>
            <th>Trạng Thái</th>
            <th>Chi Tiết Đơn Hàng</th>
            <th>Chỉnh Sửa</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($data['data'] as $r){?>
        <tr>
            <td><?php echo ($r["Ma_hoadon"]); ?></td>
            <td><?php echo ($r["ma_khachhang"]); ?></td>
            <td><?php echo ($r["tenkhachhang"]); ?></td>
            <td><?php echo ($r["Tensp"]); ?></td>
            <td><?php echo ($r["soluong"]); ?></td>
            <td><?php echo ($r["phone"]); ?></td>
            <td><?php echo ($r["diachigiaohang"]); ?></td>
            <td><?php echo number_format($r['tongtien'], 0, ',', '.'); ?> VND</td>
            <td><?php echo ($r['createdate']); ?></td>
            <td><?php echo ($r["trangthai"]); ?></td>
            <td><a href="detail/<?php echo $r['Ma_hoadon']; ?>">Xem chi tiết</a></td>
            <td><a href="Editstatus/<?php echo $r['Ma_hoadon']; ?>">Chỉnh sửa</a></td>

        </tr>
<?php } ?>

    </tbody>
</table>


</body>
</html>
