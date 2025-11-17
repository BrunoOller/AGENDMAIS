<?php
    namespace App\Controllers;

    class HomeController {
        public function index() {
            //session_start();
            include 'app/Views/Home/homepage.php';
        }

        public function sobre() {
            //session_start();
            include 'app/Views/Home/sobre.php';
        }
    
        public function contato() {
            //session_start();
            include 'app/Views/Home/contato.php';
        }
    
        public function politicas() {
            //session_start();
            include 'app/Views/Home/politicas.php';
        }
    
        public function termos() {
            //session_start();
            include 'app/Views/Home/termos.php';
        }
    }
?>