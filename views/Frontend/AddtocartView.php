<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="<?php echo BASE_URL;?>/public/styleproduct.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/css/grid.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/base.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/assets/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/grid.css">
</head>
<body>

<?php
$cookie_names = ['id', 'fullname', 'phone', 'email'];
foreach ($cookie_names as $name) {
    $$name = isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}
?>
<div class="container">
    <div class="title">
        <h2>Đặt hàng sản phẩm</h2>
    </div>
    <div class="d-flex">
    <form action="Addtocart/dathang" method="POST" enctype="multipart/form-data" id="orderForm">

            <label>
                <input hidden name="id" value="<?php echo ($id); ?>" required>
            </label>
            <label>
                <span class="name">Tên khách hàng <span class="required">*</span></span>
                <input type="text" name="name" placeholder="Nhập tên khách hàng" value="<?php echo ($fullname); ?>" required>
            </label>
            <label>
                <span class="lname">Số điện thoại <span class="required">*</span></span>
                <input type="text" name="phone" placeholder="Nhập số điện thoại khách hàng" value="<?php echo ($phone); ?>" required>
            </label>
            <label>
                <span>Email</span>
                <input type="email" name="email" placeholder="Nhập email khách hàng" value="<?php echo ($email); ?>">
            </label>
            <label>
                <span>Tỉnh/Thành phố <span class="required">*</span></span>
                <select name="city" required>
                    <option value="">Chọn tỉnh thành...</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                    <option value="Hải Phòng">Hải Phòng</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                </select>
            </label>
            <label>
                <span>Quận/huyện <span class="required">*</span></span>
                <input type="text" name="district" placeholder="Quận huyện" required>
            </label>
            <label>
                <span>Địa chỉ giao hàng <span class="required">*</span></span>
                <input type="text" name="address" placeholder="Địa chỉ giao hàng" required>
            </label>
            <label>
                <span>Ngày đặt hàng <span class="required">*</span></span>
                <input type="date" name="order_date" required>
            </label>
        </form>
        <div class="Yorder">    
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Đơn Hàng Của Bạn</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $totalPrice = 0; 
                if ($data['data']) {
                    foreach ($data['data'] as $item) {
                        // Tính giá trị tổng cộng cho đơn hàng
                        $discount = (floatval($item['discount']) / 100) * floatval($item['price']);
                        $tt = floatval($item['quantity']) * (floatval($item['price']) - $discount);
                        $totalPrice += $tt;
                        ?>
                        <tr>
                            <td><?php echo $item['product_name'] ?></td>
                            <td><?php echo $item['quantity'] ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='2'>Giỏ hàng trống</td></tr>";
                }
                ?>
                <tr>
                    <td>Tổng Cộng</td>
                    <td><?php echo number_format($totalPrice, 0, ',', '.') . ' VNĐ'; ?></td>
                </tr>
                <tr>
                    <td>Phí Giao Hàng</td>
                    <td>Miễn phí giao hàng</td>
                </tr>
            </tbody>
            </table>
            <br>
            <div>
                <input type="radio" name="payment" value="bank_transfer" checked> Chuyển Khoản Ngân Hàng
            </div>
            <div>
                <input type="radio" name="payment" value="cash_on_delivery"> Thanh Toán Khi Nhận Hàng
            </div>
            <div>
                <input type="radio" name="payment" value="paypal"> Paypal
                <span>
                    <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="Paypal Logo" width="50">
                </span>
            </div>

            <!-- Nút đặt hàng -->
            <button type="submit" form="orderForm" name="btn_save" value="Đặt hàng">Đặt hàng</button>

        </div>
    </div>
</div>

<!-- Mã JavaScript để thêm giỏ hàng vào form -->
<script>
document.querySelector('button[name="btn_save"]').addEventListener('click', function(event) {
    // Kiểm tra nếu giỏ hàng có sản phẩm
    var orderItems = <?php echo json_encode($data['data']); ?>;
    
    // Nếu giỏ hàng trống, hiển thị thông báo và ngừng gửi form
    if (!orderItems || orderItems.length === 0) {
        alert('Giỏ hàng không có sản phẩm!');
        event.preventDefault();  // Ngừng gửi form
        return;
    }

    // Nếu có sản phẩm trong giỏ hàng, chuyển giỏ hàng thành chuỗi JSON
    var serializedOrderItems = JSON.stringify(orderItems);

    // Tạo input ẩn chứa thông tin giỏ hàng
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'order_items';
    input.value = serializedOrderItems;

    // Thêm input ẩn vào form
    document.getElementById('orderForm').appendChild(input);
});


</script>

</body> 
</html>
