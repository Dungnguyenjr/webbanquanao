<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Trạng Thái Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .admin-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        form {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="admin">
        <div class="admin-container">
            <div class="admin-header">
                <h2>Cập Nhật Trạng Thái Đơn Hàng</h2>
            </div>

            <?php 
                // Assuming you have an 'updateStatus' class defined elsewhere
                $obj = new Adminorder;
                // $Ma_hoadon = isset($_POST["txt_Ma_hoadon"]) ? $_POST["txt_Ma_hoadon"] : $data["data"][0]["Ma_hoadon"];
                $Ma_hoadon =  $data["data3"]["Ma_hoadon"];
            ?> 
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="Ma_hoadon">Mã Hoá Đơn</label>
                    <input type="text" name="txt_Ma_hoadon" readonly value="<?php echo $Ma_hoadon; ?>" />
                </div>

                <label for="trangthai">Trạng Thái Mới:</label>
                <input type="radio" name="trangthai" value="Chưa thanh toán" checked> Chưa thanh toán
                <input type="radio" name="trangthai" value="Hủy đơn hàng"> Hủy đơn hàng
                <input type="radio" name="trangthai" value="Đang giao hàng"> Đang giao hàng
                <input type="radio" name="trangthai" value="Đã thanh toán"> Đã thanh toán
                <br>

                <input type="submit" value="Cập Nhật Trạng Thái">
            </form>
        </div>
    </div>
</body>
</html>
