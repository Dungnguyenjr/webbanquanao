<?php
class customer extends Controller {
    public function getShow() {

        $obj = $this->model("customermodel");
        $data = $obj->showcustomermodel();
        
        $this->view("AdminView", ["page"=>"viewcustomer","data"=>$data]);
    }


    public function delete($ma_khachhang){
        $obj = $this->model("customermodel");
        $obj->deletecustomer($ma_khachhang);
        header("location:http://localhost/phpnangcao/webbanquanao/customer/getShow");
    }
    public function update($ma_khachhang) {
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
                    echo "<script>alert('Sửa thông tin thành công');window.location.href='http://localhost/phpnangcao/webbanquanao/customer/getShow';</script>";
                }
            } 
        } else {
            $customer = $obj->getcustomerId($ma_khachhang);
            $this->view("AdminView", ["page" => "editcustomer", "customer" => $customer]);
        }
    }
   
    
    
    
    
    


    
}
