<!DOCTYPE html>
<html>
<head>
    <title>Đánh Giá sản phẩm</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <style>
        /* Cải thiện kiểu dáng của form */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="radio"]:checked + label {
            font-weight: bold;
            color: #007bff;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 15px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #00bba6;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #018576;
        }
    </style>
</head>
<body>
    
<form action="" method="POST">
<div class="container">
        <h2>Đánh giá sản phẩm</h2>
        <?php if (isset($data['data']) && is_array($data['data'])): ?>
            <?php foreach ($data['data'] as $r): ?>
             <input type="hidden" name="ma_hoadon" value="<?php echo $r['ma_hoadon']; ?>">
            <input type="hidden" name="ma_khachhang" value="<?php echo $r['ma_khachhang']; ?>">
            <input type="hidden" name="tenkhachhang" value="<?php echo $r['tenkhachhang']; ?>">
            <input type="hidden" name="tongtien" value="<?php echo $r['tongtien']; ?>">
            <input type="hidden" name="createdate" value="<?php echo $r['createdate']; ?>">

            <input type="radio" id="good" name="rating" value="good">
            <label for="good">Tốt</label><br>
            <input type="radio" id="average" name="rating" value="average">
            <label for="average">Bình thường</label><br>
            <input type="radio" id="bad" name="rating" value="bad">
            <label for="bad">Tệ</label><br>


        <label for="comment">Nhập đánh giá của bạn:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>

        <button type="submit" formaction="http://localhost/phpnangcao/webbanquanao/Reportuser/insert">Gửi đánh giá</button>
    </form>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>
