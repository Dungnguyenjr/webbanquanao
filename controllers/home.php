<?php 

//  session_start(); // Bắt đầu session nếu sử dụng session (bỏ đi vì bạn đang dùng cookie)

class home extends Controller {
    
    public function getShow() {
        $obj = $this->model("AdProductModel");
        $data = $obj->showAdProductModel();
        
        $this->view("UserView", ["page" => "User", "data" => $data]);
    }

    public function Detail($Ma_sp) {
        $obj = $this->model("adproductmodel");
        $data = $obj->getProductBymasp($Ma_sp);
        
 
        $this->view("UserView", ["page" => "Viewdetail", "data" => $data]);
    }

    public function cart($ma_sp) {
        $obj = $this->model("adproductmodel");
        $data = $obj->getadroductById2($ma_sp);
    
        // Lấy ID người dùng từ cookie
        $userId = $_COOKIE['id'] ?? null;
    
        // Lấy giỏ hàng từ cơ sở dữ liệu nếu người dùng đã đăng nhập
        $cartItems = [];
        if ($userId) {
            $cartItems = $this->model("cart")->getCartById($userId);
        }
    
        // Thêm sản phẩm vào giỏ hàng
        if (isset($cartItems[$ma_sp])) {
            // Nếu sản phẩm đã có trong giỏ hàng, chỉ cần tăng số lượng
            $cartItems[$ma_sp]['qty'] += 1;
        } else {
            // Nếu sản phẩm chưa có, thêm mới
            $cartItems[$ma_sp] = [
                'qty' => 1,
                'Ma_sp' => $data['Ma_sp'],
                'Tensp' => $data['Tensp'],
                'hinhanh' => $data['hinhanh'],
                'giaxuat' => $data['giaxuat'],
                'khuyenmai' => $data['khuyenmai'],
            ];
        }
    
        // Cập nhật giỏ hàng vào cơ sở dữ liệu nếu người dùng đã đăng nhập
        if ($userId) {
            $this->model("cart")->Cart($userId, $cartItems);
        } 
        
        header("location:..");
        exit();
    }


    public function search() {
        // Kiểm tra nếu có từ khóa tìm kiếm trong GET request
     
            $Tensp = $_POST['search'];
            $obj = $this->model("adproductmodel");

            $data = $obj->searchProducts($Tensp);
         
        $this->view("UserView", ["page" => "Search", "data" => $data]);
    }
    

}
