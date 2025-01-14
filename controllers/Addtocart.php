<?php
class Addtocart extends Controller {

    public function getshow() {
        // Kiểm tra nếu người dùng đã đăng nhập qua cookie
        $userId = $_COOKIE['id'] ?? null;  // Lấy ID người dùng từ cookie

        if ($userId) {
            $obj = $this->model("addtocartmodel");
            $data = $obj->getaddById($userId);
            
        } else {
            // Nếu chưa đăng nhập, lấy giỏ hàng từ cookie
            $data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        }
        // var_dump($userId);
        
        // Gửi dữ liệu giỏ hàng đến view
        $this->view("UserView", ["page" => "AddtocartView", 'data' => $data]);
    }

    public function dathang() {
        if (!isset($_POST['btn_save'])) {
            echo "btn_save không được thiết lập.";
            return;
        }
        error_log("Dữ liệu POST: " . print_r($_POST, true));
        echo "Hàm dathang đã được gọi.";
        
        // Kiểm tra và lấy dữ liệu từ POST
        $id = $_COOKIE['id'] ?? '';  
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $city = $_POST['city'] ?? '';
        $district = $_POST['district'] ?? '';
        $address = $_POST['address'] ?? '';
        $order_date = $_POST['order_date'] ?? '';  
        $order_items = json_decode($_POST['order_items'], true) ?? [];
    
        // Kiểm tra giỏ hàng
        if (empty($order_items)) {
            echo "Giỏ hàng không có sản phẩm!";
            exit();
        }
        // Tính tổng tiền
        $totalPrice = 0;
        foreach ($order_items as $item) {
            $discountedPrice = $item['price'] * (1 - $item['discount'] / 100);
            $totalPrice += $item['quantity'] * $discountedPrice;
        }
        $ma_hoadon = "HD" . time();
        $obj = $this->model("addtocartmodel");
        
        try {
            // Lưu thông tin khách hàng
            if (!$obj->customer($id, $ma_hoadon, $name, $phone, $email, $city, $district, $address, $order_date)) {
                throw new Exception("Lỗi khi lưu thông tin khách hàng.");
            }
    
            // Lưu thông tin đơn hàng
            if (!$obj->order($ma_hoadon, $id, $name, $totalPrice, $order_date, 'Chờ xét duyệt')) {
                throw new Exception("Lỗi khi lưu thông tin đơn hàng.");
            }
    
            // Lưu chi tiết đơn hàng và cập nhật số lượng sản phẩm
            foreach ($order_items as $item) {
                if (!$obj->orderdetail($ma_hoadon, $item['Ma_sp'], $item['product_name'], $item['quantity'], $item['price'], $item['discount'], $item['hinhanh'])) {
                    throw new Exception("Lỗi khi lưu chi tiết đơn hàng.");
                }
                $obj->updateProductQuantity($item['Ma_sp']); 
            }
            $obj->clearCart($id); 
            header("Location: " . BASE_URL . "User");
            exit();
    
        } catch (Exception $e) {
            echo "Đã có lỗi xảy ra: " . $e->getMessage();
        }
    }
    
}
?>
