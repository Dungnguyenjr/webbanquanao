<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Áp dụng chương trình khuyến mãi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        select, input[type="number"], input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #90F;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #7CF;
        }
    </style>
</head>
<body>
    <form action="applyPromotion" method="post">
        <label for="ma_sp">Chọn mã sản phẩm:</label>
        <select name="Ma_sp" id="ma_sp">
        <?php foreach($data['adproductsale'] as $adproductsale): ?>
            <option value="<?php echo $adproductsale['Ma_sp']; ?>">
                <?php echo $adproductsale['Ma_sp']; ?>
            </option>
        <?php endforeach; ?>
        </select>

        <label for="discount">Nhập số tiền giảm giá:</label>
        <input type="number" id="discount" name="discount" min="0" required>

        <label for="start_date">Ngày bắt đầu khuyến mãi:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">Ngày kết thúc khuyến mãi:</label>
        <input type="date" id="end_date" name="end_date" required>

        <input type="submit" value="Áp dụng khuyến mãi">
    </form>
</body>
</html>