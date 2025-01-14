<?php
class customermodel extends db {
    public function showcustomermodel() {
        $sql = "SELECT * FROM customer";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $customer = $stm->fetchAll();
        return $customer;
    }

    public function showcustomermodell($id) {
        $sql = "SELECT * FROM `customer` WHERE ma_khachhang = :ma_khachhang";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_khachhang', $id, PDO::PARAM_INT);
        $stm->execute();
        
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deletecustomer($ma_khachhang ) {
        $sql = "DELETE FROM customer WHERE ma_khachhang  = :ma_khachhang ";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':ma_khachhang', $ma_khachhang, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updatecustomer($ma_khachhang, $tenkhachhang, $phone, $email, $tinhthanhpho, $quanhuyen, $diachigiaohang) {
        $sql = "UPDATE customer SET tenkhachhang = :tenkhachhang, phone = :phone, email = :email, tinhthanhpho = :tinhthanhpho, quanhuyen = :quanhuyen, diachigiaohang = :diachigiaohang WHERE ma_khachhang = :ma_khachhang";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_khachhang', $ma_khachhang);
        $stm->bindParam(':tenkhachhang', $tenkhachhang);
        $stm->bindParam(':phone', $phone);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':tinhthanhpho', $tinhthanhpho);
        $stm->bindParam(':quanhuyen', $quanhuyen);
        $stm->bindParam(':diachigiaohang', $diachigiaohang);
    
        $stm->execute();
    }

    public function getcustomerId($ma_khachhang) {
        $sql = "SELECT * FROM customer WHERE ma_khachhang = :ma_khachhang";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_khachhang', $ma_khachhang);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC); //trả về dữ liệu
    }
    
    

}