<?php
    namespace App\Services;

    use App\Models\User;

    class UserService
    {
        public static function get($id = null) 
        {
            if ($id) {
                return User::select($id);
            } else {
                return User::selectAll();
            }
        }

        public static function post() 
        {
            $data = $_GET;

            return User::insert($data);
        }

        public static function update() 
        {

            $data = $_GET;

            return User::update($data);
            
        }

        public static function delete() 
        {

            $data = $_GET;

            return User::delete($data);
            
        }
    }