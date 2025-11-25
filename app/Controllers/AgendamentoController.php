<?php
    namespace App\Controllers;

    use App\Models\Agendamento;
    use App\DAO\AgendamentoDAO;
    use App\DAO\UnidadeDAO;

    class AgendamentoController {
        public function agendamentoIndex() {
            if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
                header("Location: index.php?controller=Login&action=index&msg=login_necessario");
                exit;
            }

            $agendamentoDAO = new AgendamentoDAO();
            $unidadeDAO = new UnidadeDAO();

            $exames = $agendamentoDAO->getExamesList();
            
            if (isset($exames['Erro'])) {
                error_log("Erro ao carregar ENUMs de exames: " . $exames['Erro']);
                $exames = [];
            }

            try {
                $unidadeDAO = new UnidadeDAO();
                $unidades = $unidadeDAO->findAll();
            } catch (\Exception $e) {
                $unidades = []; 
                error_log("Erro ao carregar unidades: " . $e->getMessage());
            }

            $msg = $_GET['msg'] ?? null;
            include 'app/Views/Home/agendamento.php';
        }

        public function agendar() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $this->agendamentoIndex();
                return;
            }

            if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || !isset($_SESSION['id_usuario'])) {
                header("Location: index.php?controller=Login&action=index&msg=login_necessario"); 
                exit;
            }

            $usuario_id = $_SESSION['id_usuario'];

            $unidade_id = filter_input(INPUT_POST, 'unidade_id', FILTER_VALIDATE_INT); 
            $agend_exame = filter_input(INPUT_POST, 'select_exame', FILTER_SANITIZE_STRING); 
            $agend_data = filter_input(INPUT_POST, 'data_agendamento', FILTER_SANITIZE_STRING);
            $agend_hora = filter_input(INPUT_POST, 'horario_agendamento', FILTER_SANITIZE_STRING);

            if (
                !$unidade_id || empty($agend_data) || empty($agend_hora) || empty($agend_exame)
            ) {
                header("Location: index.php?controller=Agendamento&action=agendamentoIndex&msg=erro_campos");
                exit;
            }

            $agendamento_data = [
                'unidade_id' => $unidade_id,
                'usuario_id' => $usuario_id,
                'agend_data' => $agend_data,
                'agend_hora' => $agend_hora,
                'agend_exame' => $agend_exame,
                'agend_status' => 'Pendente'
            ];

            $novoAgendamento = new Agendamento($agendamento_data);
            $agendamentoDAO = new AgendamentoDAO();

            if ($agendamentoDAO->create($novoAgendamento)) {
                header("Location: index.php?controller=Agendamento&action=agendamentoIndex&msg=sucesso");
                exit;
            } else {
                header("Location: index.php?controller=Agendamento&action=agendamentoIndex&msg=erro_bd");
                exit;
            }
        }
    }
?>