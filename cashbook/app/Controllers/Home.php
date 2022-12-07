<?php 

    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Controllers\Auth;


    class home extends BaseController{

        public function index(){
            $auth = new Auth();
            return $auth -> getIndex();
        }

        public function getSecond(){
            echo 'second here...';
        }
    }