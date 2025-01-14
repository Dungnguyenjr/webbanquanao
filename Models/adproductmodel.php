<?php
class adproductmodel extends db {
    public function showadproductmodel() {
        $sql = "SELECT * FROM adproduct";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $product = $stm->fetchAll();
        return $product;
    }
    public function showadproducttypemodel() {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $adproducttype = $stm->fetchAll(); // Gán kết quả vào biến mới
        // var_dump($adproducttype); // Kiểm tra dữ liệu trả về
        return $adproducttype; // Trả về danh sách loại sản phẩm
    }
    

    public function addProduct($data) {
        $sql = "INSERT INTO adproduct (Ma_loaisp, Ma_sp, Tensp, hinhanh, gianhap, giaxuat, khuyenmai, soluong, mota_sp, create_date) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->Connect()->prepare($sql);
        return $stmt->execute([
            $data['Ma_loaisp'], $data['Ma_sp'], $data['Tensp'], $data['hinhanh'], $data['gianhap'], $data['giaxuat'], $data['khuyenmai'], $data['soluong'], $data['mota_sp'], $data['create_date']
        ]);
    }
    
    public function checkProductTypeExists($ma_loaisp) {
        $sql = "SELECT COUNT(*) FROM adproducttype WHERE ma_loaisp = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$ma_loaisp]);
        return $stmt->fetchColumn() > 0;
    }

    
    
    public function deleteAdProduct($Ma_sp) {
        $sql = "DELETE FROM adproduct WHERE Ma_sp = :Ma_sp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':Ma_sp', $Ma_sp, PDO::PARAM_STR);
        $stmt->execute();
    }

    // public function getadroductById($Ma_loaisp) {
    //     $sql = "SELECT * FROM adproduct WHERE Ma_loaisp = :Ma_loaisp";
    //     $stm = $this->Connect()->prepare($sql);
    //     $stm->bindParam(':Ma_loaisp', $Ma_loaisp);
    //     $stm->execute();
    //     return $stm->fetch(PDO::FETCH_ASSOC);
    // }
    public function getadroductById($Ma_loaisp) {
        $sql = "SELECT * FROM adproduct WHERE Ma_loaisp = :Ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_loaisp', $Ma_loaisp);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC); //trả về dữ liệu
    }

    public function getadroductById2($ma_sp) {
        $sql = "SELECT * FROM adproduct WHERE ma_sp = :ma_sp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_sp', $ma_sp);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC); //trả về dữ liệu
    }
    

    
    public function updateadproduct($Ma_loaisp, $Ma_sp, $Tensp, $hinhanh, $gianhap, $giaxuat, $khuyenmai, $soluong, $mota_sp, $create_date) {
        $sql = "UPDATE adproduct SET Ma_sp = :Ma_sp, Tensp = :Tensp, hinhanh = :hinhanh, gianhap = :gianhap, giaxuat = :giaxuat, khuyenmai = :khuyenmai, soluong = :soluong, mota_sp = :mota_sp, create_date = :create_date WHERE Ma_loaisp = :Ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_loaisp', $Ma_loaisp);
        $stm->bindParam(':Ma_sp', $Ma_sp);
        $stm->bindParam(':Tensp', $Tensp);
        $stm->bindParam(':hinhanh', $hinhanh);
        $stm->bindParam(':gianhap', $gianhap);
        $stm->bindParam(':giaxuat', $giaxuat);
        $stm->bindParam(':khuyenmai', $khuyenmai);
        $stm->bindParam(':soluong', $soluong);
        $stm->bindParam(':mota_sp', $mota_sp);
        $stm->bindParam(':create_date', $create_date);
    
        $stm->execute();
    }

    public function getProductBymasp($Ma_sp) {
        $sql = "SELECT * FROM adproduct WHERE Ma_sp = :Ma_sp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_sp', $Ma_sp, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }


    public function adproductsale() {
        $sql = "SELECT Ma_sp, khuyenmai FROM adproduct";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $adproductsale = $stm->fetchAll(); 
        return $adproductsale; 
    }

    public function updateadproductsale($Ma_sp, $khuyenmai) {
        $sql = "UPDATE adproduct SET khuyenmai = :khuyenmai WHERE Ma_sp = :Ma_sp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_sp', $Ma_sp);
        $stm->bindParam(':khuyenmai', $khuyenmai);
        return $stm->execute();
    }

    //tìm kiếm
    public function searchProducts($Tensp) {
        $sql = "SELECT * FROM adproduct WHERE Tensp LIKE :Tensp";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute([':Tensp' => '%' . $Tensp . '%']); 
        $searchResults = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        return $searchResults;
    }
    
       
} 

?>
