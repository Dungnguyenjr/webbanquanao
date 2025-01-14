<?php
class orderreport extends db {

    public function showdatasuccModel() {
        $sql = "SELECT * FROM ordersuccessful";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $datasucc = $stm->fetchAll();
        return $datasucc;
    }

    public function showdatafailModel() {
        $sql = "SELECT * FROM orderfailed";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $datafail = $stm->fetchAll();
        return $datafail;
    }

    public function showareprocessingModel() {
        $sql = "SELECT * FROM `order`";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $areprocessing = $stm->fetchAll();
        return $areprocessing;
    }

    public function countSuccessfulOrders() {
        $sql = "SELECT COUNT(*) as count FROM ordersuccessful";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchColumn();
    }


    public function countFailedOrders() {
        $sql = "SELECT COUNT(*) as count FROM orderfailed";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchColumn();
    }

    public function countProcessingOrders() {
        $sql = "SELECT COUNT(*) as count FROM `order`";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchColumn();
    }

    //đơn hàng thành công

    public function showallsucc() {
        $sql="SELECT * FROM ordersuccessful";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $successful=$stm->fetchAll();
        return $successful;
    }

    public function showallsuccfull($ma_hoadon) {
        $sql = "SELECT * FROM ordersuccessful WHERE ma_hoadon = :ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
        $stm->execute();
        $successful = $stm->fetchAll();
        return $successful;
    }

    public function showallviewfull($ma_hoadon) {
        $sql = "SELECT * FROM productreviews WHERE ma_hoadon = :ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
        $stm->execute();
        $successfulview = $stm->fetchAll();
        return $successfulview;
    }


    
    public function showsuccbydateModel($start_date, $end_date) {
        if ($start_date === null && $end_date === null) {
            $sql = "SELECT * FROM ordersuccessful";
            $stm = $this->Connect()->prepare($sql);
        } else {
            $sql = "SELECT * FROM ordersuccessful WHERE createdate BETWEEN :start_date AND :end_date";
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':start_date', $start_date);
            $stm->bindParam(':end_date', $end_date);
        }
        
        $stm->execute();
        $databydate = $stm->fetchAll();
        return $databydate;
    }
    

    public function showsuccbyyearModel($year) {
        if ($year === null) {
            $sql = "SELECT YEAR(createdate) as year, SUM(tongtien) as total_revenue FROM ordersuccessful GROUP BY YEAR(createdate)";
            $stm = $this->Connect()->prepare($sql);
        } else {
            $sql = "SELECT YEAR(createdate) as year, SUM(tongtien) as total_revenue FROM ordersuccessful WHERE YEAR(createdate) = :year GROUP BY YEAR(createdate)";
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':year', $year, PDO::PARAM_INT);
        }
    
        $stm->execute();
        return $stm->fetchAll();
    }
     //đơn hàng thất bại

     public function showallfail() {
        $sql="SELECT * FROM orderfailed";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $failed=$stm->fetchAll();
        return $failed;
    }

    public function showallfailfull($ma_hoadon) {
        $sql = "SELECT * FROM orderfailed WHERE ma_hoadon = :ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
        $stm->execute();
        $failedful = $stm->fetchAll();
        return $failedful;
    }

    
    public function showfailbydateModel($start_date, $end_date) {
        if ($start_date === null && $end_date === null) {
            $sql = "SELECT * FROM orderfailed";
            $stm = $this->Connect()->prepare($sql);
        } else {
            $sql = "SELECT * FROM orderfailed WHERE createdate BETWEEN :start_date AND :end_date";
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':start_date', $start_date);
            $stm->bindParam(':end_date', $end_date);
        }
        
        $stm->execute();
        $databydatefail = $stm->fetchAll();
        return $databydatefail;
    }




    //// user
    public function showuserhistorymodell($userId) {
        $sql = "SELECT * FROM ordersuccessful WHERE ma_khachhang = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $userId, PDO::PARAM_INT);
        $stm->execute();
        $datasucc = $stm->fetchAll();
        return $datasucc;
    }
    
    public function showallsuccfulluser($ma_hoadon) {
        $sql = "SELECT * FROM ordersuccessful WHERE ma_hoadon = :ma_hoadon";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':ma_hoadon', $ma_hoadon, PDO::PARAM_STR);
        $stm->execute();
        $successful = $stm->fetchAll();
        return $successful;
    }




    
    
    
    
    
    
    



    
    
}