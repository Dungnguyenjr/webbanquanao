<?php
class Accountuser extends Controller {

    public function getShow() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        if ($userId) {
        $obj = $this->model("usermodel");
        $data = $obj->showusermodell($userId);
        if ($data === false) {
            echo "Lỗi khi truy xuất chi tiết đơn hàng.";
        }
    } else {
        echo "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
        $data = [];
    }
        $this->view("UserView", ["page"=>"viewAccountuser","data"=>$data]);
    }



    public function update() {
        $obj = $this->model("usermodel");
    
        // Retrieve user ID from the cookie
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        // Check if the user is logged in (user ID exists)
        if ($userId) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Collect the form data
                $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
                $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
                $address = isset($_POST['address']) ? $_POST['address'] : '';

    
                // Call the update method, passing the user ID and form data
                $obj->updateAccount($userId, $fullname, $email, $phone, $gender, $nationality, $address);
    
                // Display success message and redirect
                echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href='user_profile.php';</script>";
                exit();
            }
        } else {
            echo "Vui lòng đăng nhập để cập nhật thông tin.";
        }
    
        // Load the user's account data to display in the form
        $data = $obj->showusermodell($userId);
        $this->view("UserView", ["page" => "viewAccountuser", "data" => $data]);
    }
    

    public function password() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
        $data = []; // Đảm bảo $data luôn được xác định
    
        if ($userId) {
            if (isset($_POST['update'])) {
                $oldPassword = $_POST['old_password'];
                $newPassword = $_POST['new_password'];
                $confirmNewPassword = $_POST['confirm_new_password'];
    
                // Kiểm tra mật khẩu mới có đúng yêu cầu hay không
                if (!$this->isStrongPassword($newPassword)) {
                    echo "Mật khẩu mới phải có ít nhất 12 ký tự, bao gồm 3 chữ hoa, 3 chữ thường, 3 số và 3 ký tự đặc biệt.";
                    return;
                }
    
                // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới có khớp không
                if ($newPassword !== $confirmNewPassword) {
                    echo "Mật khẩu mới và xác nhận mật khẩu mới không khớp.";
                    return;
                }
    
                // Mã hóa mật khẩu mới bằng MD5
                $newPassword = md5($newPassword);
    
                $obj = $this->model("usermodel");
                $data = $obj->updatePassword($userId, $newPassword);
    
                if ($data === false) {
                    echo "Lỗi khi cập nhật mật khẩu.";
                } else {
                    echo "Mật khẩu đã được cập nhật thành công.";
                }
            }
        } else {
            echo "Vui lòng đăng nhập để thay đổi mật khẩu.";
        }
    
        // Truyền dữ liệu vào view
        $this->view("UserView", ["page" => "Changepassword", "data" => $data]);
    }
    
    private function isStrongPassword($password) {
        // Kiểm tra điều kiện mật khẩu mạnh
        $pattern = "/^(?=(.*[a-z]){3})(?=(.*[A-Z]){3})(?=(.*\d){3})(?=(.*[\W_]){3}).{12,}$/";
        return preg_match($pattern, $password);
    }


    
    
    
}