<?php

class Adminorder extends Controller {
    public function getShow() {
        $obj = $this->model("orderdetail");
        $data = $obj->showordermodel2(); // Lấy dữ liệu từ model

        // Chuyển đổi dữ liệu để phù hợp với mảng kết quả
        $transformed_data = [];
        foreach ($data['orders'] as $order) {
            $transformed_data[] = [
                'Ma_hoadon' => $order['Ma_hoadon'],
                'ma_khachhang' => $order['ma_khachhang'],
                'tenkhachhang' => $order['tenkhachhang'],
                'Tensp' => isset($data['orderDetails'][0]['Tensp']) ? $data['orderDetails'][0]['Tensp'] : '',
                'soluong' => isset($data['orderDetails'][0]['soluong']) ? $data['orderDetails'][0]['soluong'] : '',
                'phone' => isset($data['customers'][0]['phone']) ? $data['customers'][0]['phone'] : '',
                'diachigiaohang' => isset($data['customers'][0]['diachigiaohang']) ? $data['customers'][0]['diachigiaohang'] : '',
                'tongtien' => $order['tongtien'],
                'createdate' => $order['createdate'],
                'trangthai' => $order['trangthai'],
            ];
        }
        
        $this->view("AdminView", ["page" => "Vieworder", "data" => $transformed_data]);
    }

    public function detail($ma_hoadon) {
        if ($ma_hoadon) {
            try {
                $obj = $this->model("OrderDetail");
                $data = $obj->getOrderDetails($ma_hoadon); // Lấy dữ liệu từ model
                $data1 = $data['customer'];
                $data2 = $data['order'];
                $data3 = $data['orderDetails'];


                // Kiểm tra dữ liệu trả về từ model
                // var_dump($data);

                if ($data) {
                    // Truyền tất cả dữ liệu vào view
                    $this->view("AdminView", ["page" => "ViewOrderdetail", "data1" => $data1, "data2" => $data2 ,"data3" => $data3 ]);
                } else {
                    echo "Không tìm thấy đơn hàng.";
                }
            } catch (Exception $e) {
                echo "Lỗi khi lấy thông tin chi tiết đơn hàng: " . $e->getMessage();
            }
        } else {
            echo "Mã hóa đơn không hợp lệ.";
        }
    }

    
    // public function Editstatus($Ma_hoadon) {
    //     $obj = $this->model("orderdetail");
    
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $newStatus = $_POST['trangthai'];
    //         $Ma_hoadon = $_POST['txt_Ma_hoadon'];
    //         $obj->updateStatus($Ma_hoadon, $newStatus);
    //         header("Location: http://localhost/phpnangcao/webbanquanao/Adminorder/getShow");
    //     } else {
    //         $data = $obj->getOrder($Ma_hoadon);
    //         $this->view("AdminView", ["page" => "Editstatus", "data" => $data]);
    //     }
    // }
        public function Editstatus($Ma_hoadon) {
            $obj = $this->model("orderdetail");
            $datainsert = $obj->getOrderDetails($Ma_hoadon); 
            $data1 = $datainsert['customer']; 
            $data2 = $datainsert['orderDetails']; 
            $data3 = $datainsert['order']; 
            // $this->view("AdminView", ["page" => "Editstatus", "data" => $datainsert, "data1" => $data1, "data2" => $data2,"data3"=>$data3]);
            // var_dump($datainsert);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $newStatus = $_POST['trangthai'];
                $Ma_hoadon = $_POST['txt_Ma_hoadon'];
                $obj->updateStatus($Ma_hoadon, $newStatus);
    
                if ($newStatus == 'Đã thanh toán') {
                    // Tạo mảng để truyền vào hàm successful
                    $orderData = [
                        'ma_hoadon' => $Ma_hoadon,
                        'ma_khachhang' => $data1['ma_khachhang'],
                        'tenkhachhang' => $data1['tenkhachhang'],
                        'Ma_sp' => $data2[0]['Ma_sp'],
                        'Tensp' => $data2[0]['Tensp'],
                        'soluong' => $data2[0]['soluong'],
                        'phone' => $data1['phone'],
                        'email' => $data1['email'],
                        'tinhthanhpho' => $data1['tinhthanhpho'],
                        'quanhuyen' => $data1['quanhuyen'],
                        'diachigiaohang' => $data1['diachigiaohang'],
                        'tongtien' => $data3['tongtien'],
                        'createdate' => $data3['createdate'],
                        'trangthai' => $newStatus
                    ];
                    $obj->successful($orderData);
                    $obj->deleteOrder($Ma_hoadon);

                } elseif ($newStatus == 'Hủy đơn hàng') {
                    //dựa vào mã này để + lại số lượng 
                    $Ma_sp = $data2[0]['Ma_sp']; 
                    $obj->updateProductQuantity($Ma_sp);
                    // Tạo mảng để truyền vào hàm failed
                    $orderDatafailed = [
                        'ma_hoadon' => $Ma_hoadon,
                        'ma_khachhang' => $data1['ma_khachhang'],
                        'tenkhachhang' => $data1['tenkhachhang'],
                        'Ma_sp' => $data2[0]['Ma_sp'],
                        'Tensp' => $data2[0]['Tensp'],
                        'soluong' => $data2[0]['soluong'],
                        'phone' => $data1['phone'],
                        'email' => $data1['email'],
                        'tinhthanhpho' => $data1['tinhthanhpho'],
                        'quanhuyen' => $data1['quanhuyen'],
                        'diachigiaohang' => $data1['diachigiaohang'],
                        'tongtien' => $data3['tongtien'],
                        'createdate' => $data3['createdate'],
                        'trangthai' => $newStatus
                    ];

                    
                    $obj->failed($orderDatafailed);
                            
                    $obj->deleteOrder($Ma_hoadon);
                }
    
                header("Location: http://localhost/phpnangcao/webbanquanao/Adminorder/getShow");
            } else {
                // Lấy thông tin đơn hàng
                $data = $obj->getOrder($Ma_hoadon);
                $this->view("AdminView", ["page" => "Editstatus", "data" => $data, "data1" => $data1, "data2" => $data2,"data3"=>$data3]);
            }
        }
    
    

    
    
    
    
    

    

    
    
    
}

