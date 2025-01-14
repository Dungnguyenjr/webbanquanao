<?php
class productreviews extends db {
    public function showproductreviewsmodel() {
        $sql="SELECT * FROM productreviews";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $reviews=$stm->fetchAll();
        return $reviews;
    }
    public function postReportuser($data) {
        $sql = "INSERT INTO productreviews (ma_hoadon, ma_khachhang, tenkhachhang, tongtien, createdate, rating, comment)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->Connect()->prepare($sql);
        return $stmt->execute([
            $data['ma_hoadon'], $data['ma_khachhang'], $data['tenkhachhang'], $data['tongtien'], $data['createdate'], $data['rating'], $data['comment']
        ]);
    }

    public function isReviewed($ma_hoadon) {
        $sql = "SELECT * FROM productreviews WHERE ma_hoadon = :ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_hoadon', $ma_hoadon);
        $stm->execute();
        
        // Kiểm tra xem có kết quả nào không
        return $stm->rowCount() > 0;
    }


    
    
}