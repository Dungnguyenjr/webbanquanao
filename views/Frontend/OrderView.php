<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="<?php echo BASE_URL;?>/public/csscart.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Shopping Cart</h1>

        <?php if ($data['data']): ?>
            <form action="<?php echo BASE_URL;?>Order/updateCart" method="POST">
                <?php
                $tongtien = 0;
                foreach ($data['data'] as $i => $k): 
                    $discount = (floatval($k['khuyenmai']) / 100) * floatval($k['giaxuat']);
                    $tt = floatval($k['qty']) * (floatval($k['giaxuat']) - $discount);
                    $tongtien += $tt;
                ?>
                    <div class="cart-item">
                        <img src="<?= BASE_URL ?>/public/images/<?= ($k['hinhanh']) ?>" alt="<?= ($k['Tensp']) ?> Image" width="140" height="140">
                        <div class="item-details">
                            <p>Sản phẩm thứ: <?= $i + 1 ?></p>
                            <p>Mã sản phẩm: <?= ($k['Ma_sp']) ?></p>
                            <p>Tên sản phẩm: <?= ($k['Tensp']) ?></p>
                            <p class="price">Giá tiền: <?= number_format($k['giaxuat'], 0, ',', '.') ?> VNĐ</p>
                            <p class="total-price">Tổng tiền: <?= number_format($tt, 0, ',', '.') ?> VNĐ</p>
                            <div class="quantity">
                                <p>Số lượng: <input type="number" name="qty[<?= ($k['Ma_sp']) ?>]" value="<?= ($k['qty']) ?>" min="1" style="width: 80px;"></p>
                            </div>
                        </div>
                        <div class="button-group">
                            <button type="button" onclick="window.location.href='<?= BASE_URL . 'Order/removeCart/' . ($k['Ma_sp']); ?>'">Xoá</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="total">
                    <p>Tổng tiền: <?= number_format($tongtien, 0, ',', '.') ?> VNĐ</p>
                    <input type="submit" name="update" value="Cập nhật">
                    <input formaction="<?php echo BASE_URL;?>Addtocart" type="submit" name="addocart" value="Đặt hàng">
                </div>
            </form>
        <?php else: ?>
            <div class="empty-cart">
                <p>Giỏ hàng của bạn đang trống</p>
            </div>
        <?php endif; ?>

        <?php
            $totalDiscount = 0;

            foreach ($data['data'] as $k) {
                $totalDiscount += $k['khuyenmai']; 
            }

            ?>
            <div class='voucher'>
                
                <p>Voucher giảm đến: <strong><?= number_format($totalDiscount, 0, ',', '.'); ?>%</strong> <a onclick='toggleVoucherDetails()'> Xem thêm voucher</a></p>
                <div class="voucher-details" id="voucherDetails" style="display: none;">
                    <?php foreach ($data['data'] as $k): ?>
                        <p>Mã giảm giá cho sản phẩm <?= $k['Tensp']; ?>: <strong><?= number_format($k['khuyenmai'], 0, ',', '.'); ?>%</strong></p>
                    <?php endforeach; ?>
                    <p>Giảm giá 20% cho đơn hàng trên 500.000₫. Áp dụng đến hết tháng này!</p>
                </div>
            </div>
            <?php
            $voucherContent = ob_get_clean();
            echo $voucherContent;
            ?>

    </div>

    <script>
        function toggleVoucherDetails() {
            var details = document.getElementById("voucherDetails");
            details.style.display = details.style.display === "none" ? "block" : "none";
        }
    </script>
</body>
</html>
