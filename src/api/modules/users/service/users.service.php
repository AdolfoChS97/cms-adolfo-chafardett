<?php

Class UsersService {
    public function __construct() {}

    public function register() {
        if (function_exists('mysqli_connect')) {
            echo "mysqli is enabled\n";
        } else {
            echo "mysqli is not enabled\n";
        }
        
        return var_dump('hello');
    }

    public function update() {}

    public function getById() {}
}