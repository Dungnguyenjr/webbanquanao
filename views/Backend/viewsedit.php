
<?php
 $obj= new adproducttype;
 $txt_ma_loaisp =isset($_POST["txt_ma_loaisp"])?$_POST["txt_ma_loaisp"]:$data["product"]["ma_loaisp"];
 $txt_ten_loaisp =isset($_POST["txt_ten_loaisp"])?$_POST["txt_ten_loaisp"]:$data["product"]["ten_loaisp"];
 $txt_mota_loaisp =isset($_POST["txt_mota_loaisp"])?$_POST["txt_mota_loaisp"]:$data["product"]["mota_loaisp"];
?>
<form method="post">
    <table class="center-table">
        <tr>
            <td>Mã loại sản phẩm</td>
            <td><input type="text" name="txt_ma_loaisp" readonly value="<?php echo $txt_ma_loaisp; ?>" /></td>
        </tr>
        <tr>
            <td>Tên loại sản phẩm</td>
            <td><input type="text" name="txt_ten_loaisp" value="<?php echo $txt_ten_loaisp; ?>" /></td>
        </tr>
        <tr>
            <td>Mô tả sản phẩm</td>
            <td><textarea name="txt_mota_loaisp" cols="20" rows="5"><?php echo $txt_mota_loaisp; ?></textarea></td>
        </tr>
        <tr class="center-buttons">
            <td colspan="2">
                <input type="submit" name="btn_submit" value="Cập nhật"/>
                <input type="reset" name="reset" value="Reset"/>
            </td>
        </tr>
    </table>
</form>
