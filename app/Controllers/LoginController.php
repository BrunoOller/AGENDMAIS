<?php
    namespace App\Controllers;

    use App\DAO\UsuarioDAO;
    use App\Models\Usuario;

    require_once 'app/DAO/UsuarioDAO.php';
    require_once 'app/Models/Usuario.php';

    class LoginController {
        public function index() {
            $msg = $_GET['msg'] ?? null;
            include 'app/Views/Account/login.php';
        }

        public function autenticar() {
            session_start();

            if ($_SERVER['REQUREST_METHOD'] == 'POST') {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $senha = filter_input(INPUT_POST, 'senha');

                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->findByEmail($email);

                if ($usuario && password_verify($senha, $usuario->getUsuSenha())) {
                    $_SESSION['logado'] =  true;
                    $_SESSION['id_usuario'] = $usuario->getIdUsuario();
                    $_SESSION['usu_nome'] = $usuario->getUsuNome();
                    $_SESSION['usu_is_admin'] = $usuario->getUsuIsAdmin();

                    if ($usuario->getUsuIsAdmin()) {
                        header("Location: index.php?controller=Admin&action=dashboard");
                    } else {
                        header("Location: index.php?controller=Home&action=index");
                    }
                    exit;
                } else {
                    header("Location: index.php?controller=Login&action=index&msg=erro");
                    exit;
                }
            }
            $this->index();
        }

        public function registrarIndex() {
            $msg = $_GET['msg'] ?? null;
            include 'app/Views/Account/register.php';
        }

        public function registrar() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $senha_pura = $_POST['senha'];
                $email = $_POST['email'];

                $senha_hash = password_hash($senha_pura, PASSWORD_DEFAULT);

                $novoUsuario = new Usuario([
                    'usu_cpf' => $_POST['cpf'],
                    'usu_nome' => $_POST['nome'],
                    'usu_data' => $_POST['data'],
                    'usu_email' => $email,
                    'usu_senha' => $senha_hash,
                    'usu_telefone' => $_POST['tel'],
                    'usu_is_admin' => 0
                ]);

                $usuarioDAO = new UsuarioDAO();

                if ($usuarioDAO->create($novoUsuario)) {
                    header("Location: index.php?controller=Login&action=index&msg=sucesso");
                    exit;
                } else {
                    header("Location: index.php?controller=Login&action=registrarIndex&msg=erro_db");
                    exit;
                } 
            }
            $this->registrarIndex();
        }
        
        public function logout() {
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php?controller=Home&action=index");
            exit;
        }
    }
?>