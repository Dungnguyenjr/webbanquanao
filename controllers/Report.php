<?php
class Report extends Controller {

    public function getShow() {
        $obj = $this->model("orderreport");
        
        $data1 = $obj->showdatasuccModel(); 
        $data2 = $obj->showdatafailModel(); 
        $data3 = $obj->showareprocessingModel();

        $totalQuantity = count($data1); 
        $totalCanceledOrders = count($data2); 
        $totalOrders = count($data3);

        // Calculate total revenue
        $totalRevenue = 0;
        foreach ($data1 as $order) {
            $totalRevenue += $order['tongtien'];
        }

        $data = [
            "totalQuantity" => $totalQuantity,
            "totalCanceledOrders" => $totalCanceledOrders,
            "totalOrders" => $totalOrders,
            "totalRevenue" => $totalRevenue,
        ];

        $this->view("AdminView", ["page" => "Revenuereport","data" => $data]);
    }

    //đơn hàng thành công

    public function detailsofsuccess(){
        $obj = $this->model("orderreport");
        $data = $obj->showallsucc();

        // var_dump($data);

        $this->view("AdminView", ["page" => "Detailsuccess", "data"=>$data]);
    }
    public function detailsofsuccessfull($ma_hoadon) {
        $obj = $this->model("orderreport");
        $data = $obj->showallsuccfull($ma_hoadon);
    
        $this->view("AdminView", ["page" => "Detailsuccessfull", "data" => $data]);
    }

        ///admin
        public function detailsofsuccessviews($ma_hoadon) {
            $obj = $this->model("orderreport");
            $data = $obj->showallviewfull($ma_hoadon);
        
            $this->view("AdminView", ["page" => "Detailreportuser", "data" => $data]);
        }
        

    public function chart() {
        $obj = $this->model("orderreport"); 
        $data1 = $obj->showdatasuccModel(); 
        $totalQuantity = count($data1); 

        $totalRevenue = 0;
        foreach ($data1 as $order) {
            $totalRevenue += $order['tongtien'];
        }
        $data = [
            "totalQuantity" => $totalQuantity,
            "totalRevenue" => $totalRevenue,
        ];
        $this->view("AdminView", ["page" => "Successchart","data" => $data]);
    }

    public function chartbydate() {
        $obj = $this->model("orderreport");
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
    
        if (isset($_POST['filter_all'])) {
            $start_date = null;
            $end_date = null;
        }
    
        if ($start_date && !DateTime::createFromFormat('Y-m-d', $start_date)) {
            throw new Exception("Invalid start date format");
        }
        if ($end_date && !DateTime::createFromFormat('Y-m-d', $end_date)) {
            throw new Exception("Invalid end date format");
        }
    
        $databydate = $obj->showsuccbydateModel($start_date, $end_date);
        $this->view("AdminView", ["page" => "Viewrevenuebydate", "databydate" => $databydate]);
    }

    public function chartbyyear() {
        $obj = $this->model("orderreport");
        $year = isset($_POST['year']) ? $_POST['year'] : null;
    
        if (isset($_POST['filter_all'])) {
            $year = null;
        }
    
        $databyyear = $obj->showsuccbyyearModel($year);
        $this->view("AdminView", ["page" => "Viewrevenuebyyear", "databyyear" => $databyyear]);
    }

    //đươn hàng huỷ

     //đơn hàng thành công

     public function detailsoffail(){
        $obj = $this->model("orderreport");
        $data = $obj->showallfail();

        // var_dump($data);

        $this->view("AdminView", ["page" => "Detailfailed", "data"=>$data]);
    }
    public function detailsoffailed($ma_hoadon) {
        $obj = $this->model("orderreport");
        $data = $obj->showallfailfull($ma_hoadon);
    
        $this->view("AdminView", ["page" => "Detailfailedfull", "data" => $data]);
    }

    public function chartfailed() {
        $obj = $this->model("orderreport"); 
        $data2 = $obj->showdatafailModel(); 

        $totalsoluong = count($data2); 

        $totalquantity = 0;
        foreach ($data2 as $order) {
            $totalquantity += $order['soluong'];
        }
        $data = [
            "totalsoluong" => $totalsoluong,
            "totalquantity" => $totalquantity,
        ];
        $this->view("AdminView", ["page" => "Failedchart","data" => $data]);
    }

    public function chartbydatefail() {
        $obj = $this->model("orderreport");
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
    
        if (isset($_POST['filter_all'])) {
            $start_date = null;
            $end_date = null;
        }
    
        if ($start_date && !DateTime::createFromFormat('Y-m-d', $start_date)) {
            throw new Exception("Invalid start date format");
        }
        if ($end_date && !DateTime::createFromFormat('Y-m-d', $end_date)) {
            throw new Exception("Invalid end date format");
        }
    
        $databydate = $obj->showfailbydateModel($start_date, $end_date);
        $this->view("AdminView", ["page" => "Viewrevenuebydatefail", "databydate" => $databydate]);
    }

    
    
    
    //// người dùng


    public function history() {
        $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
    
        if ($userId) {
        $obj = $this->model("orderreport");
        $data = $obj->showuserhistorymodell($userId);
        if ($data === false) {
            echo "Lỗi khi truy xuất chi tiết đơn hàng.";
        }
    } else {
        echo "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
        $data = [];
    }
        $this->view("UserView", ["page"=>"Orderuserhistory","data"=>$data]);
    }

    

    

}