<?php
    namespace App\Controllers;

    class HomeController {
        public function index() {
            include 'app/Views/Home/homepage.php';
        }

        public function sobre() {
            include 'app/Views/Home/sobre.php';
        }
    
        public function contato() {
            include 'app/Views/Home/contato.php';
        }
    
        public function politicas() {
            include 'app/Views/Home/politicas.php';
        }
    
        public function termos() {
            include 'app/Views/Home/termos.php';
        }
    }
?>