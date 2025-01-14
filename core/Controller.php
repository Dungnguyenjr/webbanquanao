<?php
class Controller{
    public function model($model){
        require_once "./Models/".$model.".php";
        return new $model;
    }

    public function view($views,$data=array()){
        require_once "./views/".$views.".php";
    }

}



