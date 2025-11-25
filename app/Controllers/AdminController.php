<?php
    namespace App\Controllers;
     
    use App\DAO\UsuarioDAO;
    use App\DAO\UnidadeDAO;
    use App\DAO\AgendamentoDAO;
    use App\Models\Usuario;
    use App\Models\Unidade;

    class AdminController {
        public function dashboard() {

            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }

            $agendamentoDAO = new AgendamentoDAO();
            $usuarioDAO = new UsuarioDAO();
            $unidadeDAO = new UnidadeDAO();

            $totalAgendamentos = $agendamentoDAO->countAll();
            $totalUsuarios = $usuarioDAO->countAll();
            $unidades = $unidadeDAO->findAll();
            $agendamentos = $agendamentoDAO->findAll();
            $usuarios = $usuarioDAO->findAll();
            $agendamentos = $agendamentoDAO->findAllWithDetails();
               
            $data = [
                'total_agendamentos' => $totalAgendamentos,
                'total_usuarios' => $totalUsuarios,
                'usuarios' => $usuarios,
                'agendamentos' => $agendamentos ,
                'msg' => $_GET['msg'] ?? null
            ];

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

                $senhaPura = $_POST['usu_senha'] ?? '';
                $senhaHash = password_hash($senhaPura, PASSWORD_DEFAULT);

                $usuarioData = [
                    'usu_email' => $_POST['usu_email'] ?? null,
                    'usu_senha' => $senhaHash,
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

        public function excluirUnidade() {
        
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !($_SESSION['usu_is_admin'] ?? false)) {
                header("Location: index.php?controller=Login&action=index&msg=acesso_negado");
                exit;
            }

            $idUnidade = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if (!$idUnidade) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=id_invalido");
                exit;
            }

            $unidadeDAO = new UnidadeDAO();
            $resultado = $unidadeDAO->delete($idUnidade);

            if ($resultado) {
                $msg = 'unidade_excluida'; 
            } else {
                $msg = 'erro_excluir_unidade'; 
            }

            header("Location: index.php?controller=Admin&action=dashboard&msg=" . $msg);
            exit;
        }

        public function gerenciarUsuarios() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
        }

            $usuarioDAO = new UsuarioDAO();
        
            $usuarios = $usuarioDAO->findAll(); 

            $data = [
                'usuarios' => $usuarios,
                'msg' => $_GET['msg'] ?? null
            ];

            include 'app/Views/Admin/dashboard.php';
        }

        public function excluirUsuario() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }
    
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $idUsuario = (int)$_GET['id'];
        
        
                if ($idUsuario === $_SESSION['id_usuario']) {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=erro_auto_exclusao");
                    exit;
                }

                $usuarioDAO = new UsuarioDAO();

                if ($usuarioDAO->delete($idUsuario)) {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=excluido_sucesso_usuario");
                    exit;
                } else {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=erro_exclusao_usuario");
                    exit;
                }
            }
            header("Location: index.php?controller=Admin&action=dashboard");
            exit;
        }

        public function salvarEdicaoAgendamento() {
        
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !($_SESSION['usu_is_admin'] ?? false)) {
                header("Location: index.php?controller=Login&action=index&msg=acesso_negado");
                exit;
            }


            $idAgendamento = filter_input(INPUT_POST, 'id_agendamento', FILTER_VALIDATE_INT);
            $novoStatus = filter_input(INPUT_POST, 'agend_status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (!$idAgendamento || !$novoStatus) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=dados_invalidos");
                exit;
            }

            $agendamentoDAO = new AgendamentoDAO();
         
            $agendamentoModel = $agendamentoDAO->findById($idAgendamento); 

            if (!$agendamentoModel) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=agendamento_nao_encontrado");
                exit;
            }

            try {

            $agendamentoModel->setAgendStatus($novoStatus);

            $agendamentoDAO->update($agendamentoModel); 

                header("Location: index.php?controller=Admin&action=dashboard&msg=sucesso_agendamento");
                exit;
            
            } catch (\Throwable $th) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=erro_db_agendamento");
                exit;
            }
        }
    }
?>