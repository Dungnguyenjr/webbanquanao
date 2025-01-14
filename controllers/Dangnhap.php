<?php
class Dangnhap extends Controller {
    
    public function getShow($id = null) { 
        $obj = $this->model("usermodel");
        if ($id) {
            $data = $obj->getid($id);
        } else {
            $data = [];
        }
        $this->view("dangnhap", ["page" => "dangnhapview",'data'=> $data]);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];
    
            // Lấy thông tin user từ database theo username
            $user = $this->model("usermodel")->getUserByUsername($username);
    
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $userData = $this->model("usermodel")->getid($user['id']);
                    
                    // Lưu thông tin người dùng vào cookie với thời gian hết hạn là 30 ngày
                    $expireTime = time() + 30 * 24 * 60 * 60; // 30 ngày
    
                    setcookie('id', $userData['id'], $expireTime, "/");
                    setcookie('username', $userData['username'], $expireTime, "/");
                    setcookie('fullname', $userData['fullname'], $expireTime, "/");
                    setcookie('email', $userData['email'], $expireTime, "/");
                    setcookie('phone', $userData['phone'], $expireTime, "/");
                    setcookie('accessLevel', $userData['accessLevel'], $expireTime, "/");  // Lưu thông tin accessLevel
    
                    echo "<script>alert('Đăng nhập thành công chúc bạn mua hàng vui vẻ ^^');</script>";
                    
                    if ($userData['accessLevel'] == 'ADMIN') {
                        // Hiển thị trang Admin nếu accessLevel là ADMIN
                        $this->view("AdminView", ["page" => "Admin"]);
                    } else {
                        // Hiển thị trang User nếu accessLevel là Nguoidung
                        $obj = $this->model("AdProductModel");
                        $data = $obj->showAdProductModel();
                        $this->view("UserView", ["page" => "User", 'cookies' => $_COOKIE, "data" => $data]);
                    }
                } else {
                    echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại'); window.location.href='Dangnhap'</script>";
                }
            } else {
                echo "<script>alert('Tài khoản hoặc mật khẩu không đúng'); window.location.href='Dangnhap'</script>";
            }
        }
    }
    
    
    public function logout() {
        foreach (['id', 'username', 'fullname', 'email', 'phone'] as $field) { 
            setcookie($field, '', time() - 3600, "/"); // Xóa cookie bằng cách đặt thời gian hết hạn trong quá khứ }
        }
        echo "<script>alert('Đăng xuất thành công!');</script>"; 
        header("Location: http://localhost/phpnangcao/webbanquanao/User"); 
         exit();
    }
    
}
?>

