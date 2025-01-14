<?php
class Customeruser extends Controller {

    public function getShow() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        if ($userId) {
        $obj = $this->model("customermodel");
        $data = $obj->showcustomermodell($userId);
        if ($data === false) {
            echo "Lỗi khi truy xuất chi tiết đơn hàng.";
        }
    } else {
        echo "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
        $data = [];
    }
        
        $this->view("UserView", ["page"=>"viewcustomer","data"=>$data]);
    }

    public function delete1($ma_khachhang){
        $obj = $this->model("customermodel");
        $obj->deletecustomer($ma_khachhang);
        header("location:http://localhost/phpnangcao/webbanquanao/customer/getShow1");
    }

    public function update1($ma_khachhang) {
        $obj = $this->model("customermodel");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ma_khachhang' => $_POST['ma_khachhang'] ?? null,
                'tenkhachhang' => $_POST['tenkhachhang'] ?? null,
                'phone' => $_POST['phone'] ?? null,
                'email' => $_POST['email'] ?? null,
                'tinhthanhpho' => $_POST['tinhthanhpho'] ?? null,
                'quanhuyen' => $_POST['quanhuyen'] ?? null,
                'diachigiaohang' => $_POST['diachigiaohang'] ?? null
            ];
    
            if ($data['ma_khachhang']) {
                if ($obj->updatecustomer(
                    $data['ma_khachhang'], 
                    $data['tenkhachhang'], 
                    $data['phone'], 
                    $data['email'], 
                    $data['tinhthanhpho'], 
                    $data['quanhuyen'], 
                    $data['diachigiaohang']
                )) {
                    echo "<script>alert('Sửa thông tin thành công!');</script>";
                    exit();
                } else {
                    echo "<script>alert('Sửa thông tin thành công');window.location.href='http://localhost/phpnangcao/webbanquanao/Customeruser/getShow';</script>";
                }
            } 
        } else {
            $customer = $obj->getcustomerId($ma_khachhang);
            $this->view("UserView", ["page" => "editcustomer", "customer" => $customer]);
        }
    }


}