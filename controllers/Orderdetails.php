<?php
class Orderdetails extends Controller {
    public function getShow() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        if ($userId) {
            $obj = $this->model("orderdetail");
            $data = $obj->showordermodel($userId);
    
            if ($data === false) {
                echo "Lỗi khi truy xuất chi tiết đơn hàng.";
            }
        } else {
            echo "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
            $data = [];
        }
        $this->view("UserView", ["page" => "Orderdetails", "data" => $data]);
    }

   // Phương thức gọi từ controller
   public function remove($ma_hoadon) {
    if ($ma_hoadon) {
        try {
            $obj = $this->model("orderdetail");
            $obj->removeOrder($ma_hoadon);
            header("Location: http://localhost/phpnangcao/webbanquanao/Orderdetails/getShow");
            exit();
        } catch (Exception $e) {
            echo "Lỗi khi hủy đơn hàng: " . $e->getMessage();
        }
    } else {
        echo "Mã hóa đơn không hợp lệ.";
    }
}


    public function detail($ma_hoadon) {
        if ($ma_hoadon) {
            try {
                $obj = $this->model("OrderDetail");
                $data = $obj->getOrderDetails($ma_hoadon); 
                $data1 = $data['customer'];
                $data2 = $data['order'];
                $data3 = $data['orderDetails'];


                // Kiểm tra dữ liệu trả về từ model
                // var_dump($data);

                if ($data) {
                    // Truyền tất cả dữ liệu vào view
                    $this->view("UserView", ["page" => "Orderdetailview", "data1" => $data1, "data2" => $data2 ,"data3" => $data3 ]);
                } else {
                    echo "Không tìm thấy đơn hàng.";
                }
            } catch (Exception $e) {
                echo "Lỗi khi lấy thông tin chi tiết đơn hàng: " . $e->getMessage();
            }
        } else {
            echo "Mã hóa đơn không hợp lệ.";
        }
    }








 





    
    
    
    
    
    
}


