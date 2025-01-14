<?php
// Kiểm tra nội dung của mảng
$obj = new customer;
$ma_khachhang = isset($_POST["ma_khachhang"]) ? $_POST["ma_khachhang"] : $data["customer"]["ma_khachhang"];
$tenkhachhang = isset($_POST["tenkhachhang"]) ? $_POST["tenkhachhang"] : $data["customer"]["tenkhachhang"];
$email = isset($_POST["email"]) ? $_POST["email"] : $data["customer"]["email"];
$phone = isset($_POST["phone"]) ? $_POST["phone"] : $data["customer"]["phone"];
$tinhthanhpho = isset($_POST["tinhthanhpho"]) ? $_POST["tinhthanhpho"] : $data["customer"]["tinhthanhpho"];
$quanhuyen = isset($_POST["quanhuyen"]) ? $_POST["quanhuyen"] : $data["customer"]["quanhuyen"];
$diachigiaohang = isset($_POST["diachigiaohang"]) ? $_POST["diachigiaohang"] : $data["customer"]["diachigiaohang"];
?>

<form action="" method="post" enctype="multipart/form-data">
    <table class="center" width="500" border="1">
        <tr>
            <td colspan="2">Thông tin khách hàng</td>
        </tr>
        <tr>
            <td>Mã khách hàng</td>
            <td><?php echo ($ma_khachhang); ?>
        
                <input type="hidden" name="ma_khachhang" value="<?php echo ($ma_khachhang); ?>">
            </td>

        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" name="tenkhachhang" value="<?php echo ($tenkhachhang); ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="phone" value="<?php echo ($phone); ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo ($email); ?>"></td>
        </tr>
        <tr>
            <td>Tỉnh Thành Phố</td>
            <td><input type="text" name="tinhthanhpho" value="<?php echo ($tinhthanhpho); ?>"></td>
        </tr>
        <tr>
            <td>Quận Huyện</td>
            <td><input type="text" name="quanhuyen" value="<?php echo ($quanhuyen); ?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ giao hàng</td>
            <td><input type="text" name="diachigiaohang" value="<?php echo ($diachigiaohang); ?>"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center; font-size:30px; font-weight:bold">
                <input name="btn_update" type="submit" value="Sửa">
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>
