<?php
class orderdetail extends db {
    public function showordermodel($id) {
        $sql = "SELECT * FROM `order` WHERE ma_khachhang = :ma_khachhang";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_khachhang', $id, PDO::PARAM_INT);
        $stm->execute();
        
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    // Phương thức xóa đơn hàng trong model
    public function removeOrder($ma_hoadon) {
        try {
            $db = $this->Connect();
            $db->beginTransaction();
    
            // Kiểm tra xem mã hóa đơn có tồn tại không
            $sql = "SELECT COUNT(*) FROM `order` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
            $count = $stm->fetchColumn();
    
            if ($count == 0) {
                throw new Exception("Mã hóa đơn không tồn tại.");
            }
    
            // Xóa chi tiết đơn hàng từ bảng orderdetail
            $sql = "DELETE FROM oderdetail WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
    
            // Xóa đơn hàng từ bảng order
            $sql = "DELETE FROM `order` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
    
            // Xóa thông tin khách hàng liên quan (nếu có)
            $sql = "DELETE FROM `customer` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
    
            $db->commit();
        } catch (Exception $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            throw new Exception("Lỗi khi xóa đơn hàng: " . $e->getMessage());
        }
    }

    public function getOrderDetails($ma_hoadon) {
        try {
            $db = $this->Connect();
            $db->beginTransaction(); // Bắt đầu giao dịch
    
            // Lấy thông tin đơn hàng từ bảng `order`
            $sql = "SELECT * FROM `order` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
            $order = $stm->fetch(PDO::FETCH_ASSOC);
    
            if (!$order) {
                throw new Exception("Không tìm thấy đơn hàng.");
            }
    
            // Lấy thông tin khách hàng từ bảng `customer`
            $sql = "SELECT * FROM `customer` WHERE ma_khachhang = :ma_khachhang";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_khachhang', $order['ma_khachhang'], PDO::PARAM_STR);
            $stm->execute();
            $customer = $stm->fetch(PDO::FETCH_ASSOC);
    
            // Lấy chi tiết đơn hàng từ bảng `oderdetail`
            $sql = "SELECT * FROM `oderdetail` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
            $orderDetails = $stm->fetchAll(PDO::FETCH_ASSOC);
    
            // Hoàn thành giao dịch
            $db->commit();
    
            return [
                'order' => $order,
                'customer' => $customer,
                'orderDetails' => $orderDetails
            ];
    
        } catch (Exception $e) {
            // Hủy bỏ giao dịch nếu có lỗi xảy ra
            $db->rollBack();
            throw new Exception("Lỗi khi lấy thông tin chi tiết đơn hàng: " . $e->getMessage());
        }
    }
    



    //admin
    public function showordermodel2() {
        try {
            $db = $this->Connect();
    
            // Lấy dữ liệu từ bảng `order`
            $sql_order = "SELECT * FROM `order`";
            $stm_order = $db->prepare($sql_order);
            $stm_order->execute();
            $order_data = $stm_order->fetchAll(PDO::FETCH_ASSOC);
    
            // Lấy dữ liệu từ bảng `customer`
            $sql_customer = "SELECT * FROM `customer`";
            $stm_customer = $db->prepare($sql_customer);
            $stm_customer->execute();
            $customer_data = $stm_customer->fetchAll(PDO::FETCH_ASSOC);
    
            // Lấy toàn bộ chi tiết đơn hàng từ bảng `orderdetail`
            $sql_orderdetail = "SELECT * FROM `oderdetail`";
            $stm_orderdetail = $db->prepare($sql_orderdetail);
            $stm_orderdetail->execute();
            $orderDetails = $stm_orderdetail->fetchAll(PDO::FETCH_ASSOC);
    
            // Kết hợp dữ liệu từ ba bảng
            $data = [
                'orders' => $order_data,
                'customers' => $customer_data,
                'orderDetails' => $orderDetails
            ];
    
            return $data;
    
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy dữ liệu: " . $e->getMessage());
        }
    }
    

    public function getOrder($Ma_hoadon) {
        $sql = "SELECT * FROM `order` WHERE Ma_hoadon = :Ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_hoadon', $Ma_hoadon, PDO::PARAM_INT);
        $stm->execute();
        // Sử dụng fetch() để chỉ lấy một bản ghi duy nhất
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    
    public function updateStatus($Ma_hoadon, $newStatus) {
        $sql = "UPDATE `order` SET trangthai = :trangthai WHERE Ma_hoadon = :Ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':trangthai', $newStatus, PDO::PARAM_STR);
        $stm->bindParam(':Ma_hoadon', $Ma_hoadon, PDO::PARAM_INT);
        $stm->execute();
    }

    public function successful($orderData) {
        $sql = "INSERT INTO ordersuccessful (ma_hoadon, ma_khachhang, tenkhachhang, ma_sp, tensp, soluong, phone, email, tinhthanhpho, quanhuyen, diachigiaohang, tongtien, createdate, trangthai) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->Connect()->prepare($sql);
        return $stmt->execute([$orderData['ma_hoadon'],$orderData['ma_khachhang'],$orderData['tenkhachhang'],
            $orderData['Ma_sp'],
            $orderData['Tensp'],
            $orderData['soluong'],
            $orderData['phone'],
            $orderData['email'],
            $orderData['tinhthanhpho'],
            $orderData['quanhuyen'],
            $orderData['diachigiaohang'],
            $orderData['tongtien'],
            $orderData['createdate'],
            $orderData['trangthai']
        ]);
    }
    public function failed($orderDatafailed) {
        $sql = "INSERT INTO orderfailed (ma_hoadon, ma_khachhang, tenkhachhang, ma_sp, tensp, soluong, phone, email, tinhthanhpho, quanhuyen, diachigiaohang, tongtien, createdate, trangthai) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->Connect()->prepare($sql);
        return $stmt->execute([$orderDatafailed['ma_hoadon'],$orderDatafailed['ma_khachhang'],$orderDatafailed['tenkhachhang'],
            $orderDatafailed['Ma_sp'],
            $orderDatafailed['Tensp'],
            $orderDatafailed['soluong'],
            $orderDatafailed['phone'],
            $orderDatafailed['email'],
            $orderDatafailed['tinhthanhpho'],
            $orderDatafailed['quanhuyen'],
            $orderDatafailed['diachigiaohang'],
            $orderDatafailed['tongtien'],
            $orderDatafailed['createdate'],
            $orderDatafailed['trangthai']
        ]);
    }

    public function deleteOrder($ma_hoadon) {
        try {
            $db = $this->Connect();
            $db->beginTransaction(); 
            
            // Xóa chi tiết đơn hàng từ bảng `oderdetail`
            $sql = "DELETE FROM `oderdetail` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
            
            // Xóa đơn hàng từ bảng `order`
            $sql = "DELETE FROM `order` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
    
            // Xóa khách hàng từ bảng `customer`
            $sql = "DELETE FROM `customer` WHERE ma_hoadon = :ma_hoadon";
            $stm = $db->prepare($sql);
            $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
            $stm->execute();
            
            $db->commit();
        } catch (Exception $e) {
            $db->rollBack();
        }
    }
    

    public function updateProductQuantity($Ma_sp) {
        $sql = "UPDATE adproduct SET soluong = soluong + 1 WHERE Ma_sp = :Ma_sp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':Ma_sp', $Ma_sp, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    
    
    
    
    
    
}
