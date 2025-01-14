<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <link href="../style1.css" rel="stylesheet" type="text/css" />
    <link href="../all.min.css" rel="stylesheet" type="text/css" />
    <style>
        /* CSS Styles for the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #00BBA6;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Đổi Mật Khẩu</h1>
    <form method="post" action="">
    <label for="old_password">Mật khẩu cũ</label>
    <input type="password" name="old_password" placeholder="Nhập mật khẩu cũ" required />

    <label for="new_password">Mật khẩu mới</label>
    <input type="password" name="new_password" placeholder="Nhập mật khẩu mới" required />

    <label for="confirm_new_password">Nhập lại mật khẩu mới</label>
    <input type="password" name="confirm_new_password" placeholder="Nhập lại mật khẩu mới" required />

    <input type="submit" name="update" value="Lưu" />
</form>

</body>
</html>
