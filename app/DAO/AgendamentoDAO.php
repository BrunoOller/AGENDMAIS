<?php
    namespace App\DAO;

    use App\Core\Database;
    use App\Models\Agendamento;
    use PDO;
    use PDOException;

    class AgendamentoDAO {
        public function create(Agendamento $agendamento): bool {
            $pdo = Database::getConnection();

            $sql = "INSERT INTO agendamentos (unidade_id, usuario_id, agend_exame, agend_data, agend_hora, agend_status)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $agendamento->getUnidadeId(),
                    $agendamento->getUsuarioId(),
                    $agendamento->getAgendExame(),
                    $agendamento->getAgendData(),
                    $agendamento->getAgendHora(),
                    $agendamento->getAgendStatus()
                ]);
            } catch (PDOException $e) {
                // Em caso de erro do BD
                return false;
            }
        }

        public function findAllByUsuario(int $usuario_id): array {
            $pdo = Database::getConnection();
            $sql = "SELECT * FROM agendamentos WHERE usuario_id = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$usuario_id]);

            $agendamentos = [];

            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $agendamentos[] = new Agendamento($data);
            }
            return $agendamentos;
        }
    }
?>