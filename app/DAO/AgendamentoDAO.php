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

        public function getExamesList(): array {
            // Mantendo a lógica de conexão dentro do método
            $pdo = Database::getConnection(); 
            
            $sql = "SHOW COLUMNS FROM agendamentos LIKE 'agend_exame'";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (empty($result) || !isset($result['Type'])) {
                // Retorna um array vazio em caso de falha na leitura da coluna
                return [];
            }
            
            // Lógica para extrair e limpar os valores do ENUM
            $enumString = str_replace(['enum(', ')'], '', $result['Type']);
            $enumValues = explode(',', str_replace("'", '', $enumString));
            
            // Cria um array associativo onde a chave e o valor são iguais
            return array_combine($enumValues, $enumValues);
        }

        public function findByUserId(int $userId): array {
            $pdo = Database::getConnection();
            $sql = "SELECT a.*, u.uni_nome FROM agendamentos a JOIN unidades u ON a.unidade_id = u.id_unidade WHERE
             a.usuario_id = ?
             ORDER BY a.agend_data DESC, a.agend_hora DESC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$userId]);

            $agendamentos = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $agendamentos[] = new Agendamento($data);
            }
            return $agendamentos;
        }

        public function findById(int $id_agendamento): ?Agendamento {
            $pdo = Database::getConnection();
            
            $sql = "SELECT * FROM agendamentos WHERE id_agendamento = ?";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_agendamento]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Agendamento($data);
            }
            return null;
        }

        public function findAll(): array {
            $pdo = Database::getConnection();
            
            $sql = "SELECT a.*, u.uni_nome, us.usu_nome 
                    FROM agendamentos a
                    JOIN unidades u ON a.unidade_id = u.id_unidade
                    JOIN usuarios us ON a.usuario_id = us.id_usuario
                    ORDER BY a.agend_data DESC, a.agend_hora DESC";
            
            $stmt = $pdo->query($sql);
            $agendamentos = [];

            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $agendamentos[] = new Agendamento($data);
            }
            return $agendamentos;
        }

        public function update(Agendamento $agendamento): bool {
            $pdo = Database::getConnection();

            $sql = "UPDATE agendamentos SET
                        unidade_id = ?,
                        agend_exame = ?, 
                        agend_data = ?, 
                        agend_hora = ?, 
                        agend_status = ?
                    WHERE id_agendamento = ?";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $agendamento->getUnidadeId(),
                    $agendamento->getAgendExame(),
                    $agendamento->getAgendData(),
                    $agendamento->getAgendHora(),
                    $agendamento->getAgendStatus(),
                    $agendamento->getIdAgendamento()
                ]);
            } catch (\PDOException $e) {
                error_log("Erro ao atualizar agendamento: " . $e->getMessage());
                return false;
            }
        }

        public function delete(int $id_agendamento): bool {
            $pdo = Database::getConnection();
            $sql = "DELETE FROM agendamentos WHERE id_agendamento = ?";
            $stmt = $pdo->prepare($sql);
            
            try {
                return $stmt->execute([$id_agendamento]);
            } catch (\PDOException $e) { 
                error_log("Erro ao excluir agendamento: " . $e->getMessage());
                return false;
            }
        }

        public function countAll(): int {
            $pdo = Database::getConnection();
            
            $sql = "SELECT COUNT(id_agendamento) AS total FROM agendamentos";
            
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                return (int) $result['total'];
            } catch (\PDOException $e) {
                error_log("Erro ao contar agendamentos: " . $e->getMessage());
                return 0;
            }
        }

        public function findAllWithDetails(): array {
            $pdo = Database::getConnection();

            $sql = "SELECT 
                        a.*,
                        u.usu_nome AS usu_nome, 
                        uni.uni_nome AS uni_nome
                    FROM agendamentos a
                    JOIN usuarios u ON a.usuario_id = u.id_usuario -- OBS: Usei a.usuario_id aqui, verifique o nome da sua coluna FK
                    LEFT JOIN unidades uni ON a.unidade_id = uni.id_unidade
                    ORDER BY a.agend_data DESC, a.agend_hora DESC";
    
            $stmt = $pdo->query($sql);
            $agendamentos = [];

            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // O Model Agendamento agora suporta 'usu_nome' e 'uni_nome' diretamente!
                $agendamentos[] = new Agendamento($data); 
            }
            return $agendamentos;
        }
    }
?>