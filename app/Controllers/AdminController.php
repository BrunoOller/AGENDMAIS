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

            $totalAgendamentos = $agendamentoDAO->countAll();
            $totalUsuarios = $usuarioDAO->countAll();

            $agendamentos = $agendamentoDAO->findAll();
            $usuarios = $usuarioDAO->findAll();
               
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
                // Cria o hash da senha usando o algoritmo padrão (bcrypt, o mais seguro)
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

        public function gerenciarUsuarios() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
        }

            $usuarioDAO = new UsuarioDAO();
        
            // Agora podemos usar o novo método findAll()
            $usuarios = $usuarioDAO->findAll(); 

            $data = [
                'usuarios' => $usuarios,
                'msg' => $_GET['msg'] ?? null // Para mensagens de sucesso/erro após uma exclusão
            ];

            include 'app/Views/Admin/dashboard.php';
        }

        public function excluirUsuario() {
            // 1. Verifica se o usuário é administrador (Segurança)
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }
    
        // 2. Verifica se o ID do usuário foi fornecido
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $idUsuario = (int)$_GET['id'];
        
                // **PREVENÇÃO CRÍTICA**: Impede que o admin exclua a si mesmo
                if ($idUsuario === $_SESSION['id_usuario']) {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=erro_auto_exclusao");
                    exit;
                }

                $usuarioDAO = new UsuarioDAO();

            // 3. Tenta excluir
                if ($usuarioDAO->delete($idUsuario)) {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=excluido_sucesso_usuario");
                    exit;
                } else {
                    header("Location: index.php?controller=Admin&action=dashboard&msg=erro_exclusao_usuario");
                    exit;
                }
            }
            // 4. Redireciona se não houver ID válido
            header("Location: index.php?controller=Admin&action=dashboard");
            exit;
        }

        public function editarUsuarioIndex() {
            // 1. Verificação de segurança (Apenas Admin pode acessar)
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !($_SESSION['usu_is_admin'] ?? false)) {
                header("Location: index.php?controller=Login&action=index&msg=acesso_negado");
                exit;
            }

            // 2. Coleta o ID do usuário a ser editado (vem da URL)
            $idUsuario = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
            if (!$idUsuario) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=id_invalido");
                exit;
            }

            // 3. Busca o usuário no Banco de Dados
            $usuarioDAO = new UsuarioDAO();
            $usuarioModel = $usuarioDAO->findById($idUsuario);

            if (!$usuarioModel) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=usuario_nao_encontrado");
                exit;
            }

            $usuario = $usuarioModel;
        
            // 5. Inclui a View do formulário de edição
            // Crie este arquivo: app/Views/Admin/editar_usuario.php
            include 'app/Views/Admin/editUser.php'; 
        }

        public function editarUsuario() {
            // 1. Verifica se o usuário é administrador (Segurança)
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !$_SESSION['usu_is_admin']) {
                header("Location: index.php?controller=Home&action=index");
                exit;
            }   

            // 2. Busca o ID do usuário na URL
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                header("Location: index.php?controller=Admin&action=dashboard");
                exit;
            }

            $idUsuario = (int)$_GET['id'];
            // Assumimos que UsuarioDAO e UnidadeDAO já foram incluídos
            $usuarioDAO = new UsuarioDAO();
    
            // 3. Busca os dados do usuário e a lista de unidades
            $usuario = $usuarioDAO->findById($idUsuario);
    
            if (!$usuario) {
                header("Location: index.php?controller=Admin&action=dashboard&msg=usuario_nao_encontrado");
                exit;
            }

            // 4. Envia os dados para a view
            $data = [
                'usuario' => $usuario
            ];
    
            // 5. Carrega a view de Edição
            // Certifique-se de que este caminho está correto
            include 'app/Views/Admin/editUser.php'; 
        }

    }
?>