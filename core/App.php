<?php
// class App {
//     protected $controller;
//     protected $action;
//     protected $params = [];

//     function __construct() {
//         if (isset($_GET["url"])) {
//             $arr = $this->urlProcess();
//             // var_dump($arr);
//             if (file_exists("./controllers/" . $arr[0] . ".php")) {
//                 $this->controller = $arr[0];
//                 require_once "./controllers/".$this->controller . ".php";
//                 $this->controller = new $this->controller;

//                 if (isset($arr[1]) && method_exists($this->controller, $arr[1])) {
//                     $this->action = $arr[1];
//                 }
//                 unset($arr[1]);

//                 $this->params = $arr ? array_values($arr) : [];
//                 call_user_func_array([$this->controller, $this->action], $this->params);
//             }
//         }
//     }

//     function urlProcess() {
//         return explode("/", filter_var(trim($_GET["url"]), FILTER_SANITIZE_URL));
//     }
// }
class App{
    protected $controller="Home";
    protected $action="getShow";
    protected $param;
    function __construct(){
        if(isset($_GET["url"])){
            $arr=$this->urlprocess();
           //var_dump($arr);
           //kiểm tra tra file trong thư mục controller có tồn tại ko
           if (file_exists("./controllers/" . $arr[0] . ".php")) {
                            $this->controller = $arr[0];
                unset($arr[0]);
           }
           require_once "./controllers/".$this->controller . ".php";
                           $this->controller = new $this->controller;
           if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action=$arr[1];
                }
           }
           unset($arr[1]);
           $this->param =$arr?array_values($arr):array();
          // var_dump($this->param);
          call_user_func_array(array($this->controller,$this->action),$this->param);
        }
    }
    //viết phương thức chuyển một chuỗi URL thành array
    public function urlprocess(){
        if(isset($_GET["url"])){
           return explode('/',
           filter_var(trim($_GET["url"],'/')));
        }
    }
}

