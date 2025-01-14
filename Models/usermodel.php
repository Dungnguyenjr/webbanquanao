<?php
class usermodel extends db {
    public function showUserModel() {
        $sql = "SELECT * FROM users";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $userModel = $stm->fetchAll();
        return $userModel;
    }


    public function showusermodell($id) {
        $sql = "SELECT * FROM `users` WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }



    public function registerUser($id ,$fullname, $username, $password, $email, $phone, $gender, $nationality, $address, $hobbies, $accessLevel) {
        $stmt = $this->Connect()->prepare("INSERT INTO users (id,fullname, username, password, email, phone, gender, nationality, address, hobbies, accessLevel) 
        VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        $stmt->bindParam(1, $id, PDO::PARAM_STR);
        $stmt->bindParam(2, $fullname, PDO::PARAM_STR);
        $stmt->bindParam(3, $username, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $email, PDO::PARAM_STR);
        $stmt->bindParam(6, $phone, PDO::PARAM_STR);
        $stmt->bindParam(7, $gender, PDO::PARAM_STR);
        $stmt->bindParam(8, $nationality, PDO::PARAM_STR);
        $stmt->bindParam(9, $address, PDO::PARAM_STR);
        $stmt->bindParam(10, $hobbies, PDO::PARAM_STR);
        $stmt->bindParam(11, $accessLevel, PDO::PARAM_STR);
    
        return $stmt->execute();
    }



    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':username', $username, PDO::PARAM_STR);
        $stm->execute();
        
        // Kiểm tra kết quả truy vấn
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return false; // Không tìm thấy user
        }
    }
    
    // Phương thức lấy thông tin user bằng id
    public function getid($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function Checkusernameandemail($username, $email) {
        $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':username', $username, PDO::PARAM_STR);
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    //xoá người dùng và kiểm tra theo id

    public function deleteUserById($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function checkUserInOrders($id) {
        $sql = "SELECT COUNT(*) FROM ordersuccessful WHERE ma_khachhang = :id";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
    
        $count = $stmt->fetchColumn();
        
        return $count == 0; 
    }
    


    //gọi đến bảng ordersuccessful để lấy id từ người dùng đến đơn hàng hoàn thành

    public function showdatadetailUserModel($id) {
        // Sử dụng SELECT để lấy chỉ những cột cần thiết
        $sql = "SELECT ma_hoadon, ma_khachhang, tenkhachhang, ma_sp, tensp, soluong, phone, email, tongtien, createdate, trangthai 
                FROM ordersuccessful 
                WHERE ma_khachhang = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $detailUser = $stm->fetchAll(PDO::FETCH_ASSOC);  // Sử dụng fetchAll với mode FETCH_ASSOC để nhận dữ liệu dưới dạng mảng kết hợp
        return $detailUser;
    }
    
    // mật khẩu

    public function updatePassword($id, $newPassword) {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':password', $newPassword, PDO::PARAM_STR); 
        $stm->bindParam(':id', $id, PDO::PARAM_STR); 
        return $stm->execute(); 
    }


    //thôn tin tk 
    public function updateAccount($userId, $fullname, $email, $phone, $gender, $nationality, $address) {
        // Prepare the SQL query to update the user's information
        $sql = "UPDATE users SET fullname = :fullname, email = :email, phone = :phone, gender = :gender, nationality = :nationality, address = :address WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        
        // Bind the parameters
        $stm->bindParam(':fullname', $fullname);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':phone', $phone);
        $stm->bindParam(':gender', $gender);
        $stm->bindParam(':nationality', $nationality);
        $stm->bindParam(':address', $address);
        $stm->bindParam(':id', $userId);  // Bind the user ID
    
        // Execute the update query
        $stm->execute();
    }
    
    
    
    
}
?>