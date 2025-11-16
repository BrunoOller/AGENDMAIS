<?php
    namespace App\Controllers;
     
    class AdminController {
        public function dashboard() {
            session_start();

            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }

            include 'app/Views/Admin/dashboard.php';
        }
    }
?>