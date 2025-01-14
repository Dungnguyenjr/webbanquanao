<!DOCTYPE html>
<html>
<head>
    <title>Kho tồn</title>
</head>
<body>
    <h3 style="text-align:center;">Kho tồn</h3>
    <form method="get" action="quantri.php">
        <input type="hidden" name="action" value="khoton">
        <input type="text" name="ma_sp" class="search-bar" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($_GET['ma_sp']) ? $_GET['ma_sp'] : ''; ?>">
        <input type="submit" name="search" value="Tìm kiếm">
    </form>
    <table>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng tồn kho</th>
        </tr>
        <?php foreach ($data['data'] as $data): ?>
        <tr>
            <td><?php echo $data['Ma_sp']; ?></td>
            <td><?php echo $data['Tensp']; ?></td>
            <td><?php echo $data['soluong']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>



