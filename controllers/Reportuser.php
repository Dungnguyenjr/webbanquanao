<?php
class Reportuser extends Controller {    
    public function getShow() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        if ($userId) {
        $obj = $this->model("orderreport");
        $data = $obj->showuserhistorymodell($userId);
        if ($data === false) {
            echo "Lỗi khi truy xuất chi tiết đơn hàng.";
        }
    } else {
        echo "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
        $data = [];
    }
        $this->view("UserView", ["page"=>"Orderuserhistory","data"=>$data]);
    }
    public function reviewscomment($ma_hoadon) {
        $objOrder = $this->model("orderreport");
        $objReviews = $this->model("productreviews");
        
     
        $check = $objReviews->isReviewed($ma_hoadon);

        
        if ($check) { 
     
            echo "Hóa đơn này đã được đánh giá.";
        } else {

            $data = $objOrder->showallsuccfulluser($ma_hoadon);
            $this->view("UserView", ["page" => "reviewproduct", "data" => $data]);
        }
    }
    

    public function detailsofsuccessfull($ma_hoadon) {
        $obj = $this->model("orderreport");
        $data = $obj->showallsuccfulluser($ma_hoadon);
    
        $this->view("UserView", ["page" => "Detailsuccessfulluser", "data" => $data]);
    }

    public function insert() {
        $obj = $this->model("productreviews");
    
          
            $data = [
                'ma_hoadon' => isset($_POST['ma_hoadon']) ? trim($_POST['ma_hoadon']) : null,
                'ma_khachhang' => isset($_POST['ma_khachhang']) ? trim($_POST['ma_khachhang']) : null,
                'tenkhachhang' => isset($_POST['tenkhachhang']) ? trim($_POST['tenkhachhang']) : null,
                'tongtien' => isset($_POST['tongtien']) ? trim($_POST['tongtien']) : null,
                'createdate' => isset($_POST['createdate']) ? trim($_POST['createdate']) : null,
                'rating' => isset($_POST['rating']) ? trim($_POST['rating']) : null,
                'comment' => isset($_POST['comment']) ? trim($_POST['comment']) : null
            ];
     
            if (empty($data['rating'])) {
                echo "Bạn chưa chọn đánh giá!";
                exit;
            }
            $obj->postReportuser($data);
                // Chuyển hướng sau khi đánh giá thành công
                header("Location: http://localhost/phpnangcao/webbanquanao/Reportuser/getShow");
                exit;
            
    }
    
    

}