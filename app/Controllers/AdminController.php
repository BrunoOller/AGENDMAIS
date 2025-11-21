<?php
    namespace App\Controllers;
     
    use App\DAO\UsuarioDAO;
    use App\DAO\UnidadeDAO;
    use App\Models\Usuario;
    use App\Models\Unidade;

    require_once 'app/DAO/UsuarioDAO.php';
    require_once 'app/DAO/UnidadeDAO.php';
    require_once 'app/Models/Usuario.php';
    require_once 'app/Models/Unidade.php';
    class AdminController {
        public function dashboard() {

            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }

            include 'app/Views/Admin/dashboard.php';
        }

        public function cadastrarUnidadeIndex() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }
            $msg = $_GET['msg'] ?? null;
            include 'app/Views/Admin/Unidade/cadastro.php';
        }

        public function cadastrarUnidade() {
          if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }
            
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $unidadeData = [
                    'uni_nome' => $_POST['uni_nome'] ?? null,
                    'uni_endereco' => $_POST['uni_endereco'] ?? null,
                    'uni_telefone' => $_POST['uni_telefone'] ?? null
                ];

                $usuarioData = [
                    'usu_email' => $_POST['usu_email'] ?? null,
                    'usu_senha' => $_POST['usu_senha'] ?? null,
                    'usu_nome' => "Monitor - " . $unidadeData['uni_nome'],
                    'usu_cpf' => '9' . time(),
                    'usu_data' => date('Y-m-d'),
                    'usu_telefone' => $unidadeData['uni_telefone'],
                    'usu_is_admin' => false
                ];

                $unidadeDAO = new UnidadeDAO();
                $usuarioDAO = new UsuarioDAO();

                $novaUnidade = new Unidade($unidadeData);
                if ($unidadeDAO->create($novaUnidade)) {
                    $unidadeId = $unidadeDAO->getLastInsertedId();

                    $usuarioData['unidade_id'] = $unidadeId;
                    $novoUsuario = new Usuario($usuarioData);

                    if ($usuarioDAO->create($novoUsuario)) {
                        header("Location: index.php?controller=Admin&action=cadastrarUnidadeIndex&msg=sucesso");
                        exit;
                    } else {
                        header("Location: index.php?controller=Admin&action=cadastrarUnidadeIndex&msg=erro_usuario");
                        exit;
                    }
                } else {
                    header("Location: index.php?controller=Admin&action=cadastrarUnidadeIndex&msg=erro_unidade");
                    exit;
                }
            }
            $this->cadastrarUnidadeIndex();
        }
    }
?>