
<form method="POST" action="" enctype="multipart/form-data">
    <table width="600" border="1">
        <tr>
            <td colspan="2" style="text-align:center">Thêm mới sản phẩm</td>
        </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input name="Tentintuc" type="text" required></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh" required></td>
            </tr>
            <tr>
                <td>Mô tả sản phẩm</td>
                <td><textarea name="motasp" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Ngày tạo</td>
                <td><input name="createdate" type="date" required></td>
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
