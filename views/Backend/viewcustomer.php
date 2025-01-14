<table class="center" width="1000" border="1">
    <thead>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tỉnh thành phố</th>
            <th>Quận huyện</th>
            <th>Địa chỉ giao hàng</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data["data"])): ?>
            <?php foreach ($data["data"] as $r): ?>
                <tr>
                    <td><?php echo ($r["ma_khachhang"]); ?></td>
                    <td><?php echo ($r["tenkhachhang"]); ?></td>
                    <td><?php echo ($r["phone"]); ?></td>
                    <td><?php echo ($r["email"]); ?></td>
                    <td><?php echo ($r["tinhthanhpho"]); ?></td>
                    <td><?php echo ($r["quanhuyen"]); ?></td>
                    <td><?php echo ($r["diachigiaohang"]); ?></td>
                    <td>
                        <a href="./update/<?php echo $r['ma_khachhang']; ?>" class="blink" >Sửa</a>
                    </td>
                    <td>
                        <a href="./delete/<?php echo $r['ma_khachhang']; ?>" class="blink "
                        onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" style="text-align: center;">Không có dữ liệu</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
