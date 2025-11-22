<?php
    namespace App\Controllers;

    use App\DAO\UsuarioDAO;
    use App\DAO\AgendamentoDAO;
    use App\Models\Usuario;
    use App\Models\Agendamento;
    use DateTime;

    class PerfilController {
        public function perfilIndex() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !isset($_SESSION['id_usuario'])) {
                header("Location: index.php?controller=Login&action=index&msg=login_necessario");
                exit;
            }

            $userId = $_SESSION['id_usuario'];
            $msg = $_GET['msg'] ?? null;

            $usuarioDAO = new UsuarioDAO();
            $usuarioModel = $usuarioDAO->findById($userId);

            if (!$usuarioModel) {
                // Se o usuário não for encontrado (problema no BD), encerra a sessão por segurança
                session_destroy();
                header("Location: index.php?controller=Login&action=index&msg=erro_usuario_nao_encontrado");
                exit;
            }

            $usuario = (object) [
                'id_usuario' => $usuarioModel->getIdUsuario(),
                'nome' => $usuarioModel->getUsuNome(),
                'email' => $usuarioModel->getUsuEmail(),
                'telefone' => $usuarioModel->getUsuTelefone(),
                'cpf' => $usuarioModel->getUsuCpf(),
                'data_nascimento' => $usuarioModel->getUsuData() 
            ];

            error_log("DEBUG CPF Carregado para o Usuário ID: " . $userId . " -> CPF: " . ($usuario->cpf ?? 'NULL/Vazio'));

            try {
                $agendamentoDAO = new AgendamentoDAO();
                $agendamentos = $agendamentoDAO->findByUserId($userId);
            } catch (\Exception $e) {
                $agendamentos = [];
                error_log("Erro ao carregar agendamentos: ". $e->getMessage());
                $msg = 'erro_agendamentos';
            }

            include 'app/Views/Home/perfil.php';
        }

        public function updateProfile() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Se não for POST (alguém tentou acessar via URL), redireciona para a página de perfil
                header("Location: index.php?controller=Perfil&action=perfilIndex");
                exit;
            }

            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !isset($_SESSION['id_usuario'])) {
                header("Location: index.php?controller=Login&action=index&msg=login_necessario");
                exit;
            }

            $userId = $_SESSION['id_usuario'];

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); 
            $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);

            if (empty($nome) || empty($email) || empty($data_nascimento)) {
                header("Location: index.php?controller=Perfil&action=perfilIndex&msg=erro_campos");
                exit;
            }

            $usuarioDAO = new UsuarioDAO();
            $updateSuccess = false;

            if (!empty($senha)) {
                // 2.1. Se a senha foi preenchida: Criptografa e usa o método completo
                $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
                $updateSuccess = $usuarioDAO->updateWithPassword($userId, $nome, $email, $telefone, $data_nascimento, $senha_hashed);
            } else {
                // 2.2. Se a senha NÃO foi preenchida: Usa o método sem a senha
                $updateSuccess = $usuarioDAO->update($userId, $nome, $email, $telefone, $data_nascimento);
            }

            if ($updateSuccess) {
                // Atualiza a sessão após o sucesso no BD (importante para o cabeçalho)
                $_SESSION['usuario_nome'] = $nome; 
                $_SESSION['usuario_email'] = $email;
                header("Location: index.php?controller=Perfil&action=perfilIndex&msg=update_sucesso");
                exit;
            } else {
                header("Location: index.php?controller=Perfil&action=perfilIndex&msg=erro_bd");
                exit;
            }
        }

        
    }
?>