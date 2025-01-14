<?php
class Saleproduct extends Controller {
    public function getShow() {

        $obj = $this->model("AdProductModel");
        $adproductsale = $obj->adproductsale();
        
        $this->view("AdminView", ["page"=>"Applysale","adproductsale"=>$adproductsale]);
    }

    public function applyPromotion() {
        $obj = $this->model("AdProductModel");
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_sp = $_POST['Ma_sp'];
            $discount = $_POST['discount'];
    
            // Gọi hàm updateadproductsale với các tham số cần thiết
            if ($obj->updateadproductsale($ma_sp, $discount)) {
                echo "<script>alert('Áp dụng khuyến mãi thành công!'); window.location.href='http://localhost/phpnangcao/webbanquanao/adproduct/';</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi áp dụng khuyến mãi'); window.location.href='http://localhost/phpnangcao/webbanquanao/Saleproduct/';</script>";
            }
        }
    }
    
}