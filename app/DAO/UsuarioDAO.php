<?php
    namespace App\DAO;

    use App\Core\Database;
    use App\Models\Usuario;
    use PDO;

    require_once 'app/Core/Database.php';
    require_once 'app/Models/Usuario.php';

    class UsuarioDAO {
        // Método para Login
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

        // Método de Buscar Usuário pelo ID
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

        // Método para Cadastro
        public function create(Usuario $usuario): bool {
            $pdo = Database::getConnection();

            $sql = "INSERT INTO usuarios (unidade_id, usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            //$hashedPassword = password_hash($usuario->getUsuSenha(), PASSWORD_DEFAULT);
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
                // Em caso de email duplicado ou outro erro do BD
                return false;
            }
        }

        public function update(int $userId, string $nome, string $email, string $telefone, string $data_nascimento): bool {
            $pdo = Database::getConnection();

            $sql = "UPDATE usuarios SET
                        usu_nome = ?,
                        usu_email = ?,
                        usu_telefone = ?,
                        usu_data = ?
                    WHERE id_usuario = ?";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $nome,
                    $email,
                    $telefone,
                    $data_nascimento, // Mapeado para a coluna 'usu_data'
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
                    $data_nascimento, // Mapeado para a coluna 'usu_data'
                    $senha_hashed, // A senha Criptografada
                    $userId
                ]);
            } catch (\PDOException $e) {
                error_log("Erro ao atualizar usuário no BD (com senha): " . $e->getMessage());
                return false;
            }
        }
    }
?>