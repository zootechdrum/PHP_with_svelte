<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index() {
        echo json_encode(["Hello World"]);
    }
}

