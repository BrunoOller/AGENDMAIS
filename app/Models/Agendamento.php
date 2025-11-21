<?php
    namespace App\Models;

    class Agendamento {
        private ?int $id_agendamento;
        private int $unidade_id;
        private int $usuario_id;
        private string $agend_exame;
        private string $agend_data;
        private string $agend_hora;
        private string $agend_status;    
        
        public function __construct(array $data = []) {
            if (!empty($data)) {
                $this->id_agendamento = $data['id_agendamento'] ?? null;
                $this->unidade_id = intval($data['unidade_id'] ?? 0);
                $this->usuario_id = intval($data['usuario_id'] ?? 0);
                $this->agend_exame = (string)($data['agend_exame'] ?? '');
                $this->agend_data = (string)($data['agend_data'] ?? '');
                $this->agend_hora = (string)($data['agend_hora'] ?? '');
                $this->agend_status = (string)($data['agend_status'] ?? 'Pendente');
            }
        }

        // Getters and Setters
        public function getIdAgendamento(): ?int {
            return $this->id_agendamento;
        }
        public function setIdAgendamento(?int $id_agendamento): void {
            $this->id_agendamento = $id_agendamento;
        }

        public function getUnidadeId(): int {
            return $this->unidade_id;
        }
        public function setUnidadeId(int $unidade_id): void {
            $this->unidade_id = $unidade_id;
        }

        public function getUsuarioId(): int {
            return $this->usuario_id;
        }
        public function setUsuarioId(int $usuario_id): void {
            $this->usuario_id = $usuario_id;
        }

        public function getAgendExame(): string {
            return $this->agend_exame;
        }
        public function setAgendExame(string $agend_exame): void {
            $this->agend_exame = $agend_exame;
        }

        public function getAgendData(): string {
            return $this->agend_data;
        }
        public function setAgendData(string $agend_data): void {
            $this->agend_data = $agend_data;
        }

        public function getAgendHora(): string {
            return $this->agend_hora;
        }
        public function setAgendHora(string $agend_hora): void {
            $this->agend_hora = $agend_hora;
        }

        public function getAgendStatus(): string {
            return $this->agend_status;
        }
        public function setAgendStatus(string $agend_status): void {
            $this->agend_status = $agend_status;
        }
    }
?>