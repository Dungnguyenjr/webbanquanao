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
    </style>
</head>
<body>

<h2 style="text-align: center;">Quản Lý Nugời Khách hàng</h2>
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
            <th>Xem chi tiết người dùng</th>
            <th>Xoá người dùng</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['data'])): ?>
            <?php foreach ($data['data'] as $user): ?>
                <?php if ($user['accessLevel'] == 'Nguoidung'): // Kiểm tra quyền truy cập ?>
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
                    <td><a href="<?php echo BASE_URL; ?>/Account/detailUser/<?php echo $user['id']; ?>">Xem chi tiết</a></td>
                    <td><a href="<?php echo BASE_URL; ?>/Account/deleteUser/<?php echo $user['id']; ?>" 
                    onclick="return confirm('Bạn có chắc muốn xoá người dùng này?')">Xóa</a></td>

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
