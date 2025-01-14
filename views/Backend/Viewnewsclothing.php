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
                <th colspan="12">Quản lý Tin tức</th>
            </tr>
            <tr>
                <th colspan="12">

                    <form action="./insert">
                    <button type="submit" name="send" class="btn">Thêm Mới</button>
                </form>
                </th>   
            </tr>
            <tr>
                <th>Tên tin tức</th>
                <th>Hình ảnh</th>
                <th>Mô tả tin tức</th>
                <th>Ngày tạo tin tức</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $r) { ?>
                    <tr>
                    <td><?php echo $r['Tentintuc']; ?></td>
                    <td><img src="<?php echo BASE_URL;?>/public/newsphoto/<?php echo $r['hinhanh']; ?>" width="80"></td>
                    <td><?php echo $r['motasp']; ?></td>
                    <td><?php echo $r['createdate']; ?></td>
                    <td><a href="./delete/<?php echo ($r['id']); ?>" class="blink " 
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
