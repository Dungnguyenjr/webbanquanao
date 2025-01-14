<?php
$obj = new AdProduct;
$txt_Ma_loaisp = isset($_POST["txt_Ma_loaisp"]) ? $_POST["txt_Ma_loaisp"] : $data["adproduct"]["Ma_loaisp"];
$txt_Ma_sp = isset($_POST["txt_Ma_sp"]) ? $_POST["txt_Ma_sp"] : $data["adproduct"]["Ma_sp"];
$txt_Tensp = isset($_POST["txt_Tensp"]) ? $_POST["txt_Tensp"] : $data["adproduct"]["Tensp"];
$txt_hinhanh = isset($_POST["txt_hinhanh"]) ? $_POST["txt_hinhanh"] : $data["adproduct"]["hinhanh"];
$txt_gianhap = isset($_POST["txt_gianhap"]) ? $_POST["txt_gianhap"] : $data["adproduct"]["gianhap"];
$txt_giaxuat = isset($_POST["txt_giaxuat"]) ? $_POST["txt_giaxuat"] : $data["adproduct"]["giaxuat"];
$txt_soluong = isset($_POST["txt_soluong"]) ? $_POST["txt_soluong"] : $data["adproduct"]["soluong"];
$txt_khuyenmai = isset($_POST["txt_khuyenmai"]) ? $_POST["txt_khuyenmai"] : $data["adproduct"]["khuyenmai"];
$txt_mota_sp = isset($_POST["txt_mota_sp"]) ? $_POST["txt_mota_sp"] : $data["adproduct"]["mota_sp"];
$txt_create_date = isset($_POST["txt_create_date"]) ? $_POST["txt_create_date"] : $data["adproduct"]["create_date"];


if (isset($_POST["btn_update"])) 
?>
<form action="" method="post" enctype="multipart/form-data">
    <table width="800" border="1">
        <tr>
            <td>Mã loại sản phẩm</td>
            <!-- <td><input type="text" name="txt_Ma_loaisp" readonly value="<?php echo $txt_Ma_loaisp; ?>" /></td> -->
            <td><?php echo ($txt_Ma_loaisp); ?>
        
                <input type="hidden" name="txt_Ma_loaisp" value="<?php echo ($txt_Ma_loaisp); ?>">
            </td>
    </td>

        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="txt_Ma_sp" value="<?php echo $txt_Ma_sp; ?>"></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="txt_Tensp" value="<?php echo $txt_Tensp; ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
            <!-- <input type="file" name="hinhanh" style="border: none; padding-top: 10px"/> -->
            <img style="height: 25px; width: 25px" src="http://localhost/phpnangcao/webbanquanao/public/images/<?php echo $txt_hinhanh; ?>" />
            <input name="hinhanh" type="file" value="<?php echo $txt_hinhanh; ?>" />
            <input name="hinhanh-old" value="<?php echo $txt_hinhanh; ?>" hidden/>
            <!-- <input $txt_hinhanh readonly value="<?php echo $txt_hinhanh; ?>"  /> -->
            </td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" name="txt_gianhap" value="<?php echo $txt_gianhap; ?>"></td>
        </tr>
        <tr>
            <td>Giá xuất</td>
            <td><input type="text" name="txt_giaxuat" value="<?php echo $txt_giaxuat; ?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="txt_soluong" value="<?php echo $txt_soluong; ?>"></td>
        </tr>
        <tr>
            <td>Khuyến mãi</td>
            <td><input type="text" name="txt_khuyenmai" value="<?php echo $txt_khuyenmai; ?>"></td>
        </tr>
        <tr>
            <td>Mô tả sản phẩm</td>
            <td><input type="text" name="txt_mota_sp" value="<?php echo $txt_mota_sp; ?>"></td>
        </tr>
        <tr>
            <td>Ngày tạo</td>
            <td><input type="date" name="txt_create_date" value="<?php echo $txt_create_date; ?>"></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center;">
                <input  type="submit" style="text-align:center" value="Cập nhật" name="btn_update">
            </th>
        </tr>
    </table>
</form>
