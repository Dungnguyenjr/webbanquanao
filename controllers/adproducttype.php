<?php
class adproducttype extends Controller {
    public function getShow() {
        $obj = $this->model("adproducttypemodel");
        $data = $obj->showadproducttypemodel();
        // $this->view("views", $data);
        $this->view("AdminView", ["page"=>"Views","data"=>$data]);
        // $this->view("UserView", ["page"=>"Views","data"=>$data]);
    }

    public function delete($ma_loaisp){
        $obj = $this->model("adproducttypemodel");
        $obj->deleteAdProductType($ma_loaisp);
        header("location:..");
    }

    public function insert() {
        $obj = $this->model("adproducttypemodel");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = trim($_POST['txt_ma_loaisp']);
            $txt_ten_loaisp = trim($_POST['txt_ten_loaisp']);
            $txt_mota_loaisp = trim($_POST['txt_mota_loaisp']);
    
            // // Kiểm tra xem hàm Addproduct có được gọi hay không
            // echo "Hàm Addproduct được gọi";
    
            if ($obj->Addproduct($id, $txt_ten_loaisp, $txt_mota_loaisp)) {
                header("Location:./adproducttype");
            }
        }
    }
    
    public function update($ma_loaisp) {
        $obj = $this->model("adproducttypemodel");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_loaisp = $_POST['txt_ten_loaisp'];
            $mota_loaisp = $_POST['txt_mota_loaisp'];
            $obj->updateAdProductType($ma_loaisp, $ten_loaisp, $mota_loaisp);
            header("Location: http://localhost/phpnangcao/webbanquanao/adproducttype/getShow");
        } else {
            $product = $obj->getProductById($ma_loaisp);
            // print_r($product);
            $this->view("AdminView", ["page" => "viewsedit", "product" => $product]);
        }
    }
    
}


?>
