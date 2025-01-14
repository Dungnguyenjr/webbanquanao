<?php
class inventory extends Controller {
    public function getShow() {

        $obj = $this->model("inventorymodel");
        $data = $obj->showinventorymodel();
        
        $this->view("AdminView", ["page"=>"viewinventory","data"=>$data]);
    }
    
}