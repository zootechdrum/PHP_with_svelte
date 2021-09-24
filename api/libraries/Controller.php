<?php
    class Controller {
        public function model($model){
            // Require model file
            require_once '../api/models/' . $model . '.php';

            return new $model();
        }
    }