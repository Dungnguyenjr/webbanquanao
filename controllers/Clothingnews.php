<?php
class Clothingnews extends Controller {
    public function getShow() {
        $obj = $this->model("News");
        $data = $obj->ShowNews();
        $this->view("AdminView", ["page" => "Viewnewsclothing", "data" => $data]);
    }

    public function delete($id) {
        $obj = $this->model("News");
        $obj->deleteNews($id);
        header("Location:..");
        exit();
    }

    public function insert() {
        $obj = $this->model("News");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES["hinhanh"])){
                $file_name= $_FILES["hinhanh"]["name"];
                $file_tmp= $_FILES["hinhanh"]["tmp_name"];
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"public/newsphoto/".$file_name);
                }
            }
            $Tentintuc = isset($_POST['Tentintuc']) ? $_POST['Tentintuc'] : '';
            $motasp = isset($_POST['motasp']) ? $_POST['motasp'] : '';
            $createdate = isset($_POST['createdate']) ? $_POST['createdate'] : '';
    
            $obj->addNews([
                'Tentintuc' => $Tentintuc,
                'hinhanh' => $file_name,  // No image file is uploaded, so we leave this empty
                'motasp' => $motasp,
                'createdate' => $createdate
            ]);
    
            echo "<script>alert('Thêm tin tức thành công!'); window.location.href='adproduct.php';</script>";
            exit();
        }
    
        // Hiển thị view với danh sách loại sản phẩm
        $this->view("AdminView", ["page" => "Newadd"]);
    }

    
    


}