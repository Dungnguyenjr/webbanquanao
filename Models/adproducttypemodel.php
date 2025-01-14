<?php
class adproducttypemodel extends db {
    public function showadproducttypemodel() {
        $sql="SELECT * FROM adproducttype";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $producttupe=$stm->fetchAll();
        return $producttupe;
    }
    public function deleteAdProductType($ma_loaisp){
        $sql="DELETE FROM adproducttype WHERE ma_loaisp='$ma_loaisp'";
        $this->Connect()->exec($sql);
    }
    public function Addproduct($id, $ten_loaisp, $mota_loaisp) {
        // Trim the input values
        $id = trim($id);
        $ten_loaisp = trim($ten_loaisp);
        $mota_loaisp = trim($mota_loaisp);
    
        // Kiểm tra xem ID sản phẩm đã tồn tại hay chưa
        $checkSql = "SELECT COUNT(*) FROM adproducttype WHERE ma_loaisp = :id";
        $checkStm = $this->Connect()->prepare($checkSql);
        $checkStm->bindParam(':id', $id);
        $checkStm->execute();
        $count = $checkStm->fetchColumn();
    
        if ($count > 0) {
            echo "<script>alert('Sản phẩm đã có, vui lòng thêm sản phẩm mới');
            window.location.href='/phpnangcao/webbanquanao/adproducttype/getShow';</script>";
        } else {
            $sql = "INSERT INTO adproducttype (ma_loaisp, ten_loaisp, mota_loaisp) VALUES (:id, :ten_loaisp, :mota_loaisp)";
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':ten_loaisp', $ten_loaisp);
            $stm->bindParam(':mota_loaisp', $mota_loaisp);
            $stm->execute();
    
            echo "<script>alert('Sản phẩm đã được thêm thành công'); 
            window.location.href='/phpnangcao/webbanquanao/adproducttype/getShow';</script>";
        }
    }
        
    public function getProductById($ma_loaisp) {
        $sql = "SELECT * FROM adproducttype WHERE ma_loaisp = :ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_loaisp', $ma_loaisp);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateAdProductType($ma_loaisp, $ten_loaisp, $mota_loaisp) {
        $sql = "UPDATE adproducttype SET ten_loaisp = :ten_loaisp, mota_loaisp = :mota_loaisp WHERE ma_loaisp = :ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_loaisp', $ma_loaisp);
        $stm->bindParam(':ten_loaisp', $ten_loaisp);
        $stm->bindParam(':mota_loaisp', $mota_loaisp);
        $stm->execute();
    }
    
}






