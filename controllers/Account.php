<?php
class Account extends Controller {

    private $usermodel;

    public function __construct() {
        $this->usermodel = $this->model("usermodel");
    }

    public function getShow($type) {
        $obj = $this->model("usermodel");
        $data = $obj->showUserModel();
    
        if ($type == 'Nguoidung') {
            $this->view("AdminView", ["page" => "Managementuser", "data" => $data]);
        } else if ($type == 'ADMIN') {
            $this->view("AdminView", ["page" => "Managementadmin", "data" => $data]);
        }
    }

    public function deleteadmin($id) {
        $obj = $this->model("usermodel");
        $obj->deleteUserById($id);
    
        header("Location: http://localhost/phpnangcao/webbanquanao/Account/getShow/ADMIN");
        exit(); 
    }
    



    public function deleteUser($id) {
        $obj = $this->model("usermodel");
    
        try {
            // Kiểm tra xem có đơn hàng không 
            $canDelete = $obj->checkUserInOrders($id);
    
            if ($canDelete) {
                //nếu không có thì xoá
                $obj->deleteUserById($id);
                header("Location: /phpnangcao/webbanquanao/Account/getShow/Nguoidung");
                exit();
            } else {
                echo "<script>alert('Không thể xóa người dùng vì có đơn hàng liên quan.!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/Account/getShow/Nguoidung';</script>";
            }
        } catch (Exception $e) {
            // Xử lý lỗi trong trường hợp gặp sự cố
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }
    
    
    
    
    

    public function detailUser($id) {
        $obj = $this->model("usermodel"); 
        $data = $obj->showdatadetailUserModel($id);  
    
        if (isset($data)) {
   
            $this->view("AdminView", ["page" => "Managetotaluserfunds", "data" => $data]);
        } else {
   
            echo "No data found for this user.";
        }
    }



    public function insertadmin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $id = null;
            $fullname = isset($_POST['txt_fullname']) ? trim($_POST['txt_fullname']) : null;
            $username = isset($_POST['txt_username']) ? trim($_POST['txt_username']) : null;
            $password = isset($_POST['txt_password']) ? trim($_POST['txt_password']) : null;
            $confirmPassword = isset($_POST['txt_confirm_password']) ? trim($_POST['txt_confirm_password']) : null;
            $email = isset($_POST['txt_email']) ? trim($_POST['txt_email']) : null;
            $phone = isset($_POST['txt_phone']) ? trim($_POST['txt_phone']) : null;
            $gender = isset($_POST['txt_gioitinh']) ? trim($_POST['txt_gioitinh']) : null;
            $nationality = isset($_POST['quoctich']) ? $_POST['quoctich'] : null;
            $address = isset($_POST['txt_address']) ? trim($_POST['txt_address']) : null;
            $hobbies = implode(", ", array_filter([
                $_POST['txt_xemphim'] ?? null,
                $_POST['txt_thethao'] ?? null,
                $_POST['txt_web'] ?? null
            ]));
            $accessLevel = isset($_POST['mucdotruycap']) ? $_POST['mucdotruycap'] : null;
            
            // Kiểm tra nếu fullname bị bỏ trống
            if (empty($fullname)) {
                echo "<script>alert('Họ tên không được để trống!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao//Account/insertadmin';</script>";
                return;
            }
    
            // Kiểm tra mật khẩu xác nhận
            if ($password !== $confirmPassword) {
                echo "<script>alert('Mật khẩu xác nhận không khớp!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao//Account/insertadmin';</script>";
                return;
            }
    
            // Kiểm tra nếu username hoặc email đã tồn tại
            if ($this->usermodel->Checkusernameandemail($username, $email)) {
                echo "<script>alert('Tên tài khoản hoặc email đã có người sử dụng!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao//Account/insertadmin';</script>";
                return;
            }
    
            // Hash mật khẩu
            $password = password_hash($password, PASSWORD_DEFAULT);
    
            // Gọi phương thức registerUser để chèn dữ liệu vào cơ sở dữ liệu
            if ($this->usermodel->registerUser($id, $fullname, $username, $password, $email, $phone, $gender, $nationality, $address, $hobbies, $accessLevel)) {
                echo "<script>alert('Thêm thành công!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/Account/getShow/ADMIN';</script>";
            } else {
                echo "<script>alert('Thiếu thông tin hoặc sai mật khẩu. Vui lòng điền lại.'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/authcontroller/';</script>";
            }
        }
        
        $this->view("AdminView", ["page" => "addadmin"]);
    }
    
    

    

}



    
 