<?php
class Clothingnewsuser extends Controller {
    public function getShow() {
        $obj = $this->model("News");
        $data = $obj->ShowNews();
        
        $this->view("UserView", ["page" => "Newspaper", "data" => $data]);
    }

    public function Detail($id) {
        $obj = $this->model("News");
        $data = $obj->getNewByid($id);
        
 
        $this->view("UserView", ["page" => "viewdetailnew", "data" => $data]);
    }

    


}