<?php
class AuthController extends Controller {
    private $usermodel;

    public function __construct() {
        $this->usermodel = $this->model("usermodel");
    }

    public function getShow() {
        $data = $this->usermodel->showUserModel();
        $this->view("dangnhap", ["page" => "registerUser", "data" => $data]);
    }

    public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = null;
            $fullname = $_POST['txt_fullname'];
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];
            $confirmPassword = $_POST['txt_confirm_password'];
            $email = $_POST['txt_email'];
            $phone = $_POST['txt_phone'];
            $gender = $_POST['txt_gioitinh'];
            $nationality = $_POST['quoctich'];
            $address = $_POST['txt_address'];
            $hobbies = implode(", ", array_filter([
                 $_POST['txt_xemphim'] ?? null,
                 $_POST['txt_thethao'] ?? null,
                 $_POST['txt_web'] ?? null
             ]));
            $accessLevel = $_POST['mucdotruycap'];
    
            // Kiểm tra mật khẩu xác nhận
            if ($password !== $confirmPassword) {
                $error = "Mật khẩu xác nhận không khớp!";
                echo "<script>alert('" . $error . "'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/authcontroller/';</script>";
            return;
            }
    
             // Kiểm tra nếu username hoặc email đã tồn tại
             if ($this->usermodel->Checkusernameandemail($username, $email)) {
                 $error = "Tên tài khoản hoặc email đã có người sử dụng!";
                 echo "<script>alert('" . $error . "'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/authcontroller/';</script>";
                 return;
            }        // Hash mật khẩu
                $password = password_hash($password, PASSWORD_DEFAULT);
    
             if ($this->usermodel->registerUser($id, $fullname, $username, $password, $email, $phone, $gender, $nationality, $address, $hobbies, $accessLevel)) {
                 echo "<script>alert('Đăng ký thành công!'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/Dangnhap/';</script>";
             } else {
                 echo "<script>alert('Thiếu thông tin hoặc sai mật khẩu. Vui lòng điền lại.'); window.location.href = 'http://localhost/phpnangcao/webbanquanao/authcontroller/';</script>";
             }
         } else {
             $this->view("Control/authcontroller");
         }
     }
    
}
?>
