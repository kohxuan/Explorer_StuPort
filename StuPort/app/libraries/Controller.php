<?php

    class Controller {
    public function model($model) {
        // Check if the class already exists
        if (class_exists($model)) {
            return new $model();
        } else {
            // Require model file
            require_once '../app/models/' . $model . '.php';
            
            // Check if the class exists after requiring the file
            if (class_exists($model)) {
                // Instantiate model
                return new $model();
            } else {
                die("Model class '$model' not found in file.");
            }
        }
    }

    //View for user intergace//
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}
?>