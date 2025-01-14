<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Danh sách Đơn hàng</title>
</head>
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
    button {
        background-color: #f2f2f2;
        border: none;
        color: white;
        padding: 15px 32px;
        font-size: 16px;
        cursor: pointer;
        transition-duration: 0.5s;
    }
    button:hover {
        background-color: #00BBA6;
    }
</style>
<body>
    <div class="main">
        <div class="content">
            <h1>Danh sách Đơn hàng</h1>

            <table class="center margin-bottom">
    <tr>
        <th>Mã hóa đơn</th>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Tổng tiền</th>
        <th>Ngày</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
        <th>Hủy đơn hàng</th>
    </tr>
    <?php 
        if (!empty($data["data"])): // Kiểm tra nếu có dữ liệu
            foreach ($data["data"] as $r): // Lặp qua dữ liệu đơn hàng
    ?>
                <tr>
                    <td><?php echo ($r["Ma_hoadon"]); ?></td>
                    <td><?php echo ($r["ma_khachhang"]); ?></td>
                    <td><?php echo ($r["tenkhachhang"]); ?></td>
                    <td><?php echo number_format($r["tongtien"], 0, ',', '.'); ?></td>
                    <td><?php echo ($r["createdate"]); ?></td>
                    <td><?php echo ($r["trangthai"]); ?></td>
                    <td>
                    <button><a href="./detail/<?php echo $r['Ma_hoadon']; ?>">Chi tiết đơn hàng</a></button>
                </td>


                    <td>
                        <button><a href="remove/<?php echo $r['Ma_hoadon']; ?>">Xóa</a>
                        </button>
                    </td>



                </tr>
    <?php 
            endforeach;
        else: 
    ?>
        <tr><td colspan="8">Không có đơn hàng nào.</td></tr>
    <?php endif; ?>
</table>


        </div>
    </div>
</body>
</html>
