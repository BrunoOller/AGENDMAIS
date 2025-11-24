<?php
    namespace App\DAO;

    use App\Models\Unidade;
    use App\Core\Database;
    use PDO;
    
    class UnidadeDAO {
        public function create(Unidade $unidade): bool {
            $pdo = Database::getConnection();

            $sql = "INSERT INTO unidades (uni_nome, uni_endereco, uni_telefone)
                    VALUES (?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            try {
                return $stmt->execute([
                    $unidade->getUniNome(),
                    $unidade->getUniEndereco(),
                    $unidade->getUniTelefone()
                ]);
            } catch (\PDOException $e) {
                // Em caso de erro do BD
                return false;
            }
        }

        public function findAll(): array {
            $pdo = Database::getConnection();
            $sql = "SELECT * FROM unidades ORDER BY uni_nome"; // Usando 'unidades'

            // Usando prepare é a melhor prática
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $unidades = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Instancia o Model Unidade
                $unidades[] = new Unidade($data);
            }
            return $unidades;
        }

        public function findById(int $id_unidade): ?Unidade {
            $pdo = Database::getConnection();
            $sql = "SELECT * FROM unidades WHERE id_unidade = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_unidade]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Unidade($data);
            }
            return null;
        }

        public function getLastInsertedId(): int {
            $pdo = Database::getConnection();
            return (int) $pdo->lastInsertId();
        }

        public function delete(int $id): bool {
            $pdo = Database::getConnection();
            $sql = "DELETE FROM unidades WHERE id_unidade = ?";
        
            try {
                $stmt = $pdo->prepare($sql);

                return $stmt->execute([$id]);
            } catch (\PDOException $e) {

                return false;
            }
        }
    }
?>