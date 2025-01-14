<?php

class Order extends Controller {

    public function getShow() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null; // Lấy ID người dùng từ cookie
        if ($userId) {
            $obj = $this->model("cart");
            $data = $obj->getCartById($userId);
            if ($data === false) {
                echo "Lỗi khi truy xuất đơn hàng";
            }
        } else {
            // Nếu chưa đăng nhập, lấy giỏ hàng từ cookie
            $data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        }
        $this->view("UserView", ["page" => "OrderView", "data" => $data]);
    }

    public function removeCart($ma_sp) {
        $userId = $_COOKIE['id'] ?? null;  // Lấy ID người dùng từ cookie
        
        if ($userId) {
            // Xóa sản phẩm khỏi giỏ hàng trong cơ sở dữ liệu
            $this->model("cart")->removeCart($userId, $ma_sp);
        }
        
        header("location:../cart");
        exit();
    }

    public function updateCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $update = $_POST['qty'];
            $userId = $_COOKIE['id'] ?? null;  // Lấy ID người dùng từ cookie

            if ($userId) {
                foreach ($update as $ma_sp => $qty) {
                    if ($qty > 0) {
                        // Lấy giá trị cũ từ cơ sở dữ liệu
                        $productDetails = $this->model("cart")->getProductDetails($userId, $ma_sp);
                        $oldGiaxuat = $productDetails['giaxuat'];
                        $oldKhuyenmai = $productDetails['khuyenmai'];
                
                        // Cập nhật giá trị mới
                        $newGiaxuat = $oldGiaxuat + $_POST['giaxuat'][$ma_sp];
                        $newKhuyenmai = $oldKhuyenmai + $_POST['khuyenmai'][$ma_sp];
                
                        // Cập nhật giỏ hàng với giá trị mới
                        $this->model("cart")->updateCartInModel($userId, $ma_sp, $qty, $newGiaxuat, $newKhuyenmai);
                    }
                }
                
                header("Location: " . BASE_URL . "Order");  // Chuyển hướng sau khi cập nhật
                exit();
            } else {
                // Nếu không có cookie id (chưa đăng nhập), chuyển hướng đến trang đăng nhập
                header("Location: " . BASE_URL . "Login");
                exit();
            }
        }
    }
}
?>
