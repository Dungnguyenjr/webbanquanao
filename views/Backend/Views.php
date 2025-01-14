
<?php
$obj= new adproducttype;
$ma_loaisp="";
$ten_loaisp="";
$mota_loaisp="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $obj->insert();
}
?>
    <table class="center-table">
        <tr>
            <th colspan="5">Quản lý danh sách loại sản phẩm</th>
        </tr>
        <tr>
            <td colspan="5">
            <form action="" method="post">
                <input type="text" name="txt_ma_loaisp" placeholder="Nhập mã loại sp" 
                value="<?php echo isset($product['ma_loaisp']) ? $product['ma_loaisp'] : ''; ?>" 
                <?php echo isset($_GET['action']) && $_GET['action'] == 'edit' ? 'readonly' : ''; ?> />
                <input type="text" name="txt_ten_loaisp" placeholder="Nhập tên loại sp" 
                value="<?php echo isset($product['ten_loaisp']) ? $product['ten_loaisp'] : ''; ?>" />
                <input type="text" name="txt_mota_loaisp" placeholder="Mô tả loại sản phẩm" 
                value="<?php echo isset($product['mota_loaisp']) ? $product['mota_loaisp'] : ''; ?>" />
                <input type="submit" value="Lưu" />
                <!-- <button type="submit" name="save">Lưu</button> -->
            </form>
            </td>
        </tr>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>Tên loại sản phẩm</td>
            <td>Mô tả loại sản phẩm</td>
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $V) { ?>
                <tr>
                    <td><?php echo $V['ma_loaisp']; ?></td>
                    <td><?php echo $V['ten_loaisp']; ?></td>
                    <td><?php echo $V['mota_loaisp']; ?></td>
                    <td><a href="./update/<?php echo $V['ma_loaisp']; ?>" class="blink">Edit</a></td>
                    <td><a href="./delete/<?php echo ($V['ma_loaisp']); ?>" class="blink" 
                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</a></td>

                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
        <?php } ?>
    </table>