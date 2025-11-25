<?php
    namespace App\DAO;

    use App\Core\Database;
    use App\Models\Usuario;
    use PDO;
    use PDOException;
    class UsuarioDAO {
        public function findByEmail(string $email): ?Usuario {
            $pdo = Database::getConnection();
            
            $sql = "SELECT id_usuario, unidade_id, usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin
                    FROM usuarios
                    WHERE usu_email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Usuario($data);
            }
            return null;
        }

        public function findById(int $id_usuario): ?Usuario {
            $pdo = Database::getConnection();
            
            $sql = "SELECT id_usuario, unidade_id, usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin
                    FROM usuarios
                    WHERE id_usuario = ?";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_usuario]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Usuario($data);
            }
            return null;
        }

        public function create(Usuario $usuario): bool {
            $pdo = Database::getConnection();

            $sql = "INSERT INTO usuarios (unidade_id, usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            $senha_hash = $usuario->getUsuSenha();

            try {
                return $stmt->execute([
                    $usuario->getUnidadeId(),
                    $usuario->getUsuCpf(),
                    $usuario->getUsuNome(),
                    $usuario->getUsuData(),
                    $usuario->getUsuEmail(),
                    $senha_hash,
                    $usuario->getUsuTelefone(),
                    $usuario->getUsuIsAdmin()
                ]);
            } catch (\PDOException $e) {
                die("Erro do BD ao criar usuário: " . $e->getMessage());
                return false;
            }
        }

        public function update(int $userId, string $nome, string $email, string $telefone, string $data_nascimento): bool {
            $pdo = Database::getConnection();

            $sql = "UPDATE usuarios SET
                        usu_nome = ?,
                        usu_email = ?,
                        usu_telefone = ?,
                        usu_data = ?,
                    WHERE id_usuario = ?";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $nome,
                    $email,
                    $telefone,
                    $data_nascimento,
                    $userId
                ]);
            } catch (\PDOException $e) {
                error_log("Erro ao atualizar usuário no BD (sem senha): " . $e->getMessage());
                return false;
            }
        }

        public function updateWithPassword(int $userId, string $nome, string $email, string $telefone, string $data_nascimento, string $senha_hashed): bool {
            $pdo = Database::getConnection();

            $sql = "UPDATE usuarios SET
                        usu_nome = ?,
                        usu_email = ?,
                        usu_telefone = ?,
                        usu_data = ?,
                        usu_senha = ? 
                    WHERE id_usuario = ?";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $nome,
                    $email,
                    $telefone,
                    $data_nascimento,
                    $senha_hashed,
                    $userId
                ]);
            } catch (\PDOException $e) {
                error_log("Erro ao atualizar usuário no BD (com senha): " . $e->getMessage());
                return false;
            }
        }

        public function countAll(): int {
            $pdo = Database::getConnection();
            
            $sql = "SELECT COUNT(id_usuario) AS total FROM usuarios";
            
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                return (int) $result['total'];
            } catch (PDOException $e) {
                error_log("Erro ao contar usuários: " . $e->getMessage());
                return 0;
            }
        }

        public function findAll(): array {
            $pdo = Database::getConnection();
            
            // O JOIN opcional se você quiser o nome da unidade do monitor
            $sql = "SELECT u.*, uni.uni_nome 
                    FROM usuarios u
                    LEFT JOIN unidades uni ON u.unidade_id = uni.id_unidade
                    ORDER BY u.usu_nome ASC";
            
            $stmt = $pdo->query($sql);
            $usuarios = [];

            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Instancia o modelo Usuario para cada linha
                $usuarios[] = new Usuario($data);
            }
            return $usuarios;
        }

        public function delete(int $id_usuario): bool {
            $pdo = Database::getConnection();
            $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
            $stmt = $pdo->prepare($sql);
            
            try {
                return $stmt->execute([$id_usuario]);
            } catch (\PDOException $e) { 
                error_log("Erro ao excluir usuário: " . $e->getMessage());
                // Por exemplo, se houver agendamentos associados a este usuário.
                return false;
            }
        }
    }
?>