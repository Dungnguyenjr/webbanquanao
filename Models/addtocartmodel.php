<?php
class addtocartmodel extends db {
    public function getaddById($id) {
        $sql = "SELECT Ma_sp, Tensp AS product_name, qty AS quantity, giaxuat AS price, khuyenmai AS discount, hinhanh FROM cart WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function customer($ma_khachhang, $ma_hoadon, $tenkhachhang, $phone, $email, $tinhthanhpho, $quanhuyen, $diachigiaohang, $date)
    {
        $sql = "INSERT INTO customer (ma_khachhang, ma_hoadon, tenkhachhang, phone, email, tinhthanhpho, quanhuyen, diachigiaohang, date) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute([$ma_khachhang, $ma_hoadon, $tenkhachhang, $phone, $email, $tinhthanhpho, $quanhuyen, $diachigiaohang, $date]);
    }

    
    
    
    public function order($ma_hoadon, $ma_khachhang, $tenkhachhang, $tongtien, $createdate, $trangthai) {
        $sql = "INSERT INTO `order` (Ma_hoadon, ma_khachhang, tenkhachhang, tongtien, createdate, trangthai) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute([$ma_hoadon, $ma_khachhang, $tenkhachhang, $tongtien, $createdate, $trangthai]);
    }
    
    
    
    
    public function orderdetail($ma_hoadon, $Ma_sp, $tensp, $soluong, $giaxuat, $khuyenmai, $hinhanh) {
        $sql = "INSERT INTO oderdetail (ma_hoadon, Ma_sp, Tensp, soluong, giaxuat, khuyenmai, hinhanh) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $this->Connect()->prepare($sql);
        return $stm->execute([$ma_hoadon, $Ma_sp, $tensp, $soluong, $giaxuat, $khuyenmai, $hinhanh]);
    }
    
    public function clearCart($id) {
        // Giả sử bạn sử dụng PDO để kết nối đến DB
        $sql = "DELETE FROM cart WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stm->execute();
    }
    
    public function updateProductQuantity($Ma_sp) {
        $sql = "UPDATE adproduct SET soluong = soluong - 1 WHERE Ma_sp = :Ma_sp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':Ma_sp', $Ma_sp, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    
    
    

}