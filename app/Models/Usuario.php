<?php
    namespace App\Models;

    class Usuario {
        private int $id_usuario;
        private ?int $unidade_id;
        private string $usu_cpf;
        private string $usu_nome;
        private string $usu_data;
        private string $usu_email;
        private string $usu_senha;
        private string $usu_telefone;
        private bool $usu_is_admin;

        public function __construct(array $data = []) {
            $this->id_usuario = $data['id_usuario'] ?? 0;
            $this->unidade_id = $data['unidade_id'] ?? null;
            $this->usu_cpf = $data['usu_cpf'] ?? '';
            $this->usu_nome = $data['usu_nome'] ?? '';
            $this->usu_data = $data['usu_data'] ?? '';
            $this->usu_email = $data['usu_email'] ?? '';
            $this->usu_senha = $data['usu_senha'] ?? '';
            $this->usu_telefone = $data['usu_telefone'] ?? '';
            $this->usu_is_admin = (bool) ($data['usu_is_admin'] ?? 0);
        }

        // Getters and Setters
        public function getIdUsuario(): int {
            return $this->id_usuario;
        }
        public function setIdUsuario(int $id_usuario): void {
            $this->id_usuario = $id_usuario;
        }

        public function getUnidadeId(): ?int {
            return $this->unidade_id;
        }
        public function setUnidadeId(int $unidade_id): void {
            $this->unidade_id = $unidade_id;
        }

        public function getUsuCpf(): string {
            return $this->usu_cpf;
        }
        public function setUsuCpf(string $usu_cpf): void {
            $this->usu_cpf = $usu_cpf;
        }

        public function getUsuNome(): string {
            return $this->usu_nome;
        }
        public function setUsuNome(string $usu_nome): void {
            $this->usu_nome = $usu_nome;
        }

        public function getUsuData(): string {
            return $this->usu_data;
        }
        public function setUsuData(string $usu_data): void {
            $this->usu_data = $usu_data;
        }

        public function getUsuEmail(): string {
            return $this->usu_email;
        }
        public function setUsuEmail(string $usu_email): void {
            $this->usu_email = $usu_email;
        }

        public function getUsuSenha(): string {
            return $this->usu_senha;
        }
        public function setUsuSenha(string $usu_senha): void {
            $this->usu_senha = $usu_senha;
        }

        public function getUsuTelefone(): string {
            return $this->usu_telefone;
        }
        public function setUsuTelefone(string $usu_telefone): void {
            $this->usu_telefone = $usu_telefone;
        }

        public function getUsuIsAdmin(): bool {
            return $this->usu_is_admin;
        }
        public function setUsuIsAdmin(bool $usu_is_admin): void {
            $this->usu_is_admin = $usu_is_admin;
        }
    }
?>