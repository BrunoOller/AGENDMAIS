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

        // Método para Cadastro
        public function create(Usuario $usuario): bool {
            $pdo = Database::getConnection();

            $sql = "INSERT INTO usuarios (usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $usuario->getUsuCpf(),
                    $usuario->getUsuNome(),
                    $usuario->getUsuData(),
                    $usuario->getUsuEmail(),
                    $usuario->getUsuSenha(),
                    $usuario->getUsuTelefone(),
                    $usuario->getUsuIsAdmin()
                ]);
            } catch (\PDOException $e) {
                // Em caso de email duplicado ou outro erro do BD
                return false;
            }
        }
    }
?>