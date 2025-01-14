<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nugời Dùng</title>
    <style>
        .admin-table {
            width: 80%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .admin-table td {
            text-align: center;
        }

        .admin-table th {
            color: white;
            background-color: #90F;
        }

        .form-container {
            text-align: center; /* Căn giữa nút */
            margin-bottom: 20px; /* Tạo khoảng cách dưới form */
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50; /* Màu nền của nút */
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049; /* Màu nền khi hover */
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Quản Lý các tài khoản ADMIN</h2>

<!-- Thêm div container để căn giữa nút -->
 <div class="form-container">
 <form action="<?php echo BASE_URL; ?>/Account/insertadmin" method="POST">
    <button type="submit" name="send" class="btn">Thêm Mới người quản lý</button>
</form>

</div>

<table class="admin-table">
    <thead>
        <tr align="center">
            <th>Mã khách Hàng</th>
            <th>Họ và tên</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Giới tính</th>
            <th>Quốc tịch</th>
            <th>Địa chỉ</th>
            <th>Sở thích</th>
            <th>Quyền hạn</th>
            <th>Xoá </th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['data'])): ?>
            <?php foreach ($data['data'] as $user): ?>
                <?php if ($user['accessLevel'] == 'ADMIN'): // Kiểm tra quyền truy cập ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['nationality']; ?></td>
                    <td><?php echo $user['address']; ?></td>
                    <td><?php echo $user['hobbies']; ?></td>
                    <td><?php echo $user['accessLevel']; ?></td>
                    <td><a href="<?php echo BASE_URL; ?>/Account/deleteadmin/<?php echo $user['id']; ?>" 
                    onclick="return confirm('Bạn có chắc muốn xoá người này?');">Xoá</a></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" align="center">Không có dữ liệu để hiển thị.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
