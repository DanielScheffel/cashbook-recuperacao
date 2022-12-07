<?php

    namespace App\Libraries;

    class Hash{

        public static function encrypt($password){

            return md5($password);

        }

        public static function check($userPassword, $dbUserPassword){

            if(md5($userPassword) == $dbUserPassword){
                return true;
            }

            return false;
        }

    }