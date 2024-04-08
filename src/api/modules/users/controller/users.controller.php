<?php 

Class UsersController {

    private $usersService;

    public function __construct() {
        $this->usersService = new UsersService();
    }

    public function getById(){
        try {
            $this->usersService->getById();
        } catch (\Exception $e) {
            throw $e;               
        }        
    }

    public function register() {
        try {
            $this->usersService->register();
        } catch (\Exception $e) {
            throw $e;               
        }
    }

    public function update() {
        try {
            $this->usersService->update();
        } catch (\Exception $e) {
            throw $e;               
        }
    }
}