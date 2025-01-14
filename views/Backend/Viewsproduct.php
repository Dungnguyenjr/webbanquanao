<?php 
    $Ma_loaisp = new AdProduct();
    if (isset($_POST["send"])) {
        $Ma_loaisp->insert();
    } 
?>
    <div class="form-container">
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="action" value="adproduct">
            <input type="text" name="tensp" class="search-bar" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($tensp) ? htmlspecialchars($tensp) : ''; ?>">
            <input type="submit" name="search" value="Tìm kiếm">
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th colspan="12">Quản lý danh sách sản phẩm</th>
            </tr>
            <tr>
                <th colspan="12">
                    <!-- <a href="./insert" class="btn">Thêm Mới</a> -->
                    <form action="./insert" method="POST">
                    <button type="submit" name="send" class="btn">Thêm Mới</button>
                </form>
                </th>   
            </tr>
            <tr>
                <th>Mã Loại sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá Nhập</th>
                <th>Giá xuất</th>
                <th>Khuyến mại</th>
                <th>Số lượng</th>
                <th>Mô tả sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $r) { ?>
                    <tr>
                    <td><?php echo $r['Ma_loaisp']; ?></td>
                    <td><?php echo $r['Ma_sp']; ?></td>
                    <td><?php echo $r['Tensp']; ?></td>
                    <td><img src="<?php echo BASE_URL;?>/public/images/<?php echo $r['hinhanh']; ?>" width="80"></td>
                    <td><?php echo $r['gianhap']; ?></td>
                    <td><?php echo $r['giaxuat']; ?></td>
                    <td><?php echo $r['khuyenmai']; ?></td>
                    <td><?php echo $r['soluong']; ?></td>
                    <td><?php echo $r['mota_sp']; ?></td>
                    <td><?php echo $r['create_date']; ?></td>
                    <td><a href="./update/<?php echo ($r['Ma_loaisp']); ?>" class="blink ">Sửa</a></td>
                    <td><a href="./delete/<?php echo ($r['Ma_sp']); ?>" class="blink " 
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="12">Không có dữ liệu</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
