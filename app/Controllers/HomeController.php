<?php
    namespace App\Controllers;

    class HomeController {
        public function index() {
            session_start();
            include 'app/Views/Home/homepage.php';
        }
    }
?>