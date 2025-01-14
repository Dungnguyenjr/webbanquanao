<?php
class AdProduct extends Controller {
    public function getShow() {

        $obj = $this->model("AdProductModel");
        $data = $obj->showAdProductModel();
        
        $this->view("AdminView", ["page"=>"Viewsproduct","data"=>$data]);
    }
    public function delete($Ma_sp) {
        $obj = $this->model("adproductmodel");
        $obj->deleteAdProduct($Ma_sp);
        header("Location:..");
    }

    public function insert() {
        $obj = $this->model("adproductmodel");
        $productTypes = $obj->showadproducttypemodel(); // Lấy danh sách loại sản phẩm
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES["hinhanh"])){
                $file_name= $_FILES["hinhanh"]["name"];
                $file_tmp= $_FILES["hinhanh"]["tmp_name"];
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"public/images/".$file_name);
                }
            }
            //mới
            // if(isset($_FILES["hinhanh"])){
            //     $file_name= $_FILES["hinhanh"]["name"];
            //     $file_tmp= $_FILES["hinhanh"]["tmp_name"];
            //     $file_size= $_FILES["hinhanh"]["size"];
            //     $file_type= strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            //     $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            //     $max_size = 10 * 1024 * 1024; // 10 MB
            
            //     if(in_array($file_type, $allowed_types) && $file_size <= $max_size){
            //         move_uploaded_file($file_tmp,"public/images/".$file_name);
            //     } else {
            //         if(!in_array($file_type, $allowed_types)){
            //             echo "File phải có định dạng .jpg, .jpeg, .png, hoặc .gif.";
            //         }
            //         if($file_size > $max_size){
            //             echo "Dung lượng file phải nhỏ hơn 10MB.";
            //         }
            //     }
            // }
            
            $ma_loaisp = isset($_POST['ma_loaisp']) ? $_POST['ma_loaisp'] : '';
            $Ma_sp = isset($_POST['Ma_sp']) ? $_POST['Ma_sp'] : '';
            $Tensp = isset($_POST['Tensp']) ? $_POST['Tensp'] : '';
            $gianhap = isset($_POST['gianhap']) ? $_POST['gianhap'] : '';
            $giaxuat = isset($_POST['giaxuat']) ? $_POST['giaxuat'] : '';
            $khuyenmai = isset($_POST['khuyenmai']) ? $_POST['khuyenmai'] : '';
            $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
            $mota_sp = isset($_POST['mota_sp']) ? $_POST['mota_sp'] : '';
            $create_date = isset($_POST['create_date']) ? $_POST['create_date'] : '';
            
        
            if (!$obj->checkProductTypeExists($ma_loaisp)) {
            } else {
                $productData = [
                    'Ma_loaisp' => $ma_loaisp,
                    'Ma_sp' => $Ma_sp,
                    'Tensp' => $Tensp,
                    'hinhanh' => $file_name,
                    'gianhap' => $gianhap,
                    'giaxuat' => $giaxuat,
                    'khuyenmai' => $khuyenmai,
                    'soluong' => $soluong,
                    'mota_sp' => $mota_sp,
                    'create_date' => $create_date
                ];
    
                $obj->addProduct($productData);
                echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='adproduct.php';</script>";
            }
        }
    
        // Hiển thị view với danh sách loại sản phẩm
        $this->view("AdminView", ["page"=>"addproduct", "productTypes"=>$productTypes]);
    }


    
    
    public function update($Ma_loaisp) {
        $obj = $this->model("adproductmodel");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Ma_loaisp = $_POST['txt_Ma_loaisp'];
            $Ma_sp = $_POST['txt_Ma_sp'];
            // if(isset($_FILES["hinhanh"])){
            //     $file_name = $_FILES["hinhanh"]["name"];
            //     $file_tmp = $_FILES["hinhanh"]["tmp_name"];
            //     if(empty($errors)==true){
            //         move_uploaded_file($file_tmp,"public/images/".$file_name);
            //     }
            // }
                //cũ
            if(isset($_FILES["hinhanh"])){
                $file_name= $_FILES["hinhanh"]["name"];
                $file_tmp= $_FILES["hinhanh"]["tmp_name"];
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"public/images/".$file_name);
                }
            }
            if($_FILES["hinhanh"]["name"] != "") {
                $hinhanh = $_FILES["hinhanh"]["name"];
            } else {
                $hinhanh = $_POST["hinhanh-old"];
            }
            //mới
            // if (isset($_FILES["hinhanh"])) {
            //     $file_name = $_FILES["hinhanh"]["name"];
            //     $file_tmp = $_FILES["hinhanh"]["tmp_name"];
            //     $file_size = $_FILES["hinhanh"]["size"];
            //     $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            //     $allowed_extensions = array("jpg", "png", "gif");
            
            //     // Kiểm tra điều kiện
            //     if (in_array($file_ext, $allowed_extensions) && $file_size < 10485760) {
            //         if (empty($errors) == true) {
            //             move_uploaded_file($file_tmp, "public/images/" . $file_name);
            //         }
            //     } else {
            //         echo "File không hợp lệ";
            //     }
            // }
            
            // if ($_FILES["hinhanh"]["name"] != "") {
            //     $hinhanh = $_FILES["hinhanh"]["name"];
            // } else {
            //     $hinhanh = $_POST["hinhanh-old"];
            // }
            


            $Tensp = $_POST['txt_Tensp'];
            $hinhanh = isset($_FILES['hinhanh']) ? $_FILES['hinhanh']["name"] : '';
            $gianhap = $_POST['txt_gianhap'];
            $giaxuat = $_POST['txt_giaxuat'];
            $khuyenmai = $_POST['txt_khuyenmai'];
            $soluong = $_POST['txt_soluong'];
            $mota_sp = $_POST['txt_mota_sp'];
            $create_date = $_POST['txt_create_date'];
            $obj->updateadproduct($Ma_loaisp, $Ma_sp, $Tensp, $hinhanh, $gianhap, $giaxuat, $khuyenmai, $soluong, $mota_sp, $create_date);

            $_SESSION['success_message'] = 'Sản phẩm đã được cập nhật thành công!';
            header("Location: http://localhost/phpnangcao/webbanquanao/adproduct/getShow");
        } else {
            if (isset($Ma_loaisp)) {
                $adproduct = $obj->getadroductById($Ma_loaisp);
                if ($adproduct) {
                    // print_r($adproduct);
                    $this->view("AdminView", ["page" => "editadproduct", "adproduct" => $adproduct]);
                } else {
                    echo 'Không tìm thấy sản phẩm với Mã loại sản phẩm: ' . $Ma_loaisp;
                }
            } else {
                echo 'Biến $Ma_loaisp chưa được khởi tạo.';
            }
        }
    }
    
    
}
?>
