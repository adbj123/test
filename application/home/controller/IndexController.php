<?php
    namespace app\home\controller;

    class IndexController extends CommonController{
        public function index(){
            return $this->fetch('');
        }
    }
?>
