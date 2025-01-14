<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-transform: uppercase;
        }
        form {
            background: linear-gradient(135deg, #ffffff, #e9ecef);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #34495e;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }
        button {
            background-color: #00bba6; /* Màu nút gửi */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s; /* Bỏ hiệu ứng nổi bọt */
        }
        button:hover {
            background-color: #009b8a; /* Màu khi di chuột */
        }
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<h2>Thông tin cá nhân</h2>

<?php if (isset($data["data"]) && !empty($data["data"])): ?>
    <?php foreach ($data["data"] as $dataItem): ?>
    <form action="update" method="POST">
        <label for="fullname">Họ và Tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo ($dataItem['fullname'] ?? ''); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo ($dataItem['email'] ?? ''); ?>" required>
        
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo ($dataItem['phone'] ?? ''); ?>">
        
        <label for="gender">Giới tính:</label>
        <select id="gender" name="gender">
            <option value="Male" <?php echo (isset($dataItem['gender']) && $dataItem['gender'] == 'Male') ? 'selected' : ''; ?>>Nam</option>
            <option value="Female" <?php echo (isset($dataItem['gender']) && $dataItem['gender'] == 'Female') ? 'selected' : ''; ?>>Nữ</option>
            <option value="Other" <?php echo (isset($dataItem['gender']) && $dataItem['gender'] == 'Other') ? 'selected' : ''; ?>>Khác</option>
        </select>
        
        <label for="nationality">Quốc tịch:</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo ($dataItem['nationality'] ?? ''); ?>">
        
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" rows="4"><?php echo ($dataItem['address'] ?? ''); ?></textarea>
        
        <label for="accessLevel">Cấp độ truy cập:</label>
        <input type="text" readonly id="accessLevel" name="accessLevel" value="<?php echo ($dataItem['accessLevel'] ?? ''); ?>">
        
        <button type="submit">Gửi</button>
    </form>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align: center; color: #e74c3c;">Không có dữ liệu người dùng.</p>
<?php endif; ?>

</body>
</html>