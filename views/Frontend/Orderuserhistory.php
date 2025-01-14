<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8">
    <title>Lịch sử mua hàng</title>
    <link href="style1.css" rel="stylesheet" type="text/css"/>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0; }
        .main { width: 100%; padding: 20px 0; }
        .content { max-width: 1200px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; }
        h1 { text-align: center; font-size: 2em; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        td { background-color: #fff; }
        a { color: #00bba6; text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
        .btn-delete { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .btn-delete:hover { background-color: #00bba6; }
    </style>
</head>
<body>
<div class="main">
    <div class="content">
        <div class="featuredProducts">
            <h1>Lịch Sử Mua Hàng</h1>
        </div>
        <table>
            <tr>
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Thành Tiền</th>
                <th>Ngày Mua Hàng</th>
                <th>Chi Tiết Đơn Hàng</th>
                <th>Đánh Giá Sản Phẩm</th>
            </tr>

            <?php if (isset($data['data']) && is_array($data['data'])): ?>
                <?php foreach ($data['data'] as $r): ?>
                    <tr align="center">
                        <td><?php echo $r['ma_khachhang']; ?></td>
                        <td><?php echo $r['tenkhachhang']; ?></td>
                        <td><?php echo $r['tongtien']; ?></td>
                        <td><?php echo $r['createdate']; ?></td>
                        <td><a href="./detailsofsuccessfull/<?php echo $r['ma_hoadon']; ?>">Xem Chi tiết</a></td>
                        <td><a href="./reviewscomment/<?php echo $r['ma_hoadon']; ?>">Đánh giá sản phẩm</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <form method="post" style="text-align: center; margin-top: 20px;">
            <input type="submit" name="delete" value="Xóa lịch sử mua hàng" class="btn-delete"/>
        </form>
    </div>
</div>
</body>
</html>


