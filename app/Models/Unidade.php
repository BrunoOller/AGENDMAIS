<?php
    namespace app\Models;

    class Unidade {
        private ?int $id_unidade;
        private string $uni_nome;
        private string $uni_endereco;
        private ?string $uni_telefone;

        public function __construct(array $data = []) {
            $this->id_unidade = $data['id_unidade'] ?? null;
            $this->uni_nome = $data['uni_nome'] ?? null;
            $this->uni_endereco = $data['uni_endereco'] ?? null;
            $this->uni_telefone = $data['uni_telefone'] ?? null;
        }

        // Getters and Setters
        public function getIdUnidade(): ?int {
            return $this->id_unidade;
        }
        public function setIdUnidade(?int $id_unidade): void {
            $this->id_unidade = trim($id_unidade);
        }

        public function getUniNome(): string {
            return $this->uni_nome;
        }
        public function setUniNome(string $uni_nome): void {
            $this->uni_nome = trim($uni_nome);
        }

        public function getUniEndereco(): string {
            return $this->uni_endereco;
        }
        public function setUniEndereco(string $uni_endereco): void {
            $this->uni_endereco = trim($uni_endereco);
        }

        public function getUniTelefone(): ?string {
            return $this->uni_telefone;
        }
        public function setUniTelefone(?string $uni_telefone): void {
            $this->uni_telefone = trim($uni_telefone);
        }

    }
?>