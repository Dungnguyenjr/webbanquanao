<form method="POST" action="" enctype="multipart/form-data">
    <table width="600" border="1">
        <tr>
            <td colspan="2" style="text-align:center">Thêm mới sản phẩm</td>
        </tr>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>
            <select name="ma_loaisp" id="ma_loaisp">
        <?php foreach($data['productTypes'] as $productType): ?>
            <option value="<?php echo $productType['ma_loaisp']; ?>">
                <?php echo $productType['ma_loaisp']; ?>
            </option>
        <?php endforeach; ?>
             </select>
            </td>

</tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input name="Ma_sp" type="text" required></td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input name="Tensp" type="text" required></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh" required></td>
            </tr>

                <td>Giá nhập</td>
                <td><input name="gianhap" type="text" required></td>
            </tr>
            <tr>
                <td>Giá xuất</td>
                <td><input name="giaxuat" type="text" required></td>
            </tr>
            <tr>
                <td>Khuyến mại</td>
                <td><input name="khuyenmai" type="text"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input name="soluong" type="text" required></td>
            </tr>
            <tr>
                <td>Mô tả sản phẩm</td>
                <td><textarea name="mota_sp" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Ngày tạo</td>
                <td><input name="create_date" type="date" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input name="btn_save" type="submit" value="Cập nhật">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
