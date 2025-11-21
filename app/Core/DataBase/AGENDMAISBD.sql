-- Criação do BD
CREATE DATABASE agendmais CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Selecionando o BD
USE agendmais;

-- Visualizar as Tabelas
SHOW TABLES;

-- Tabela de Usuários
CREATE TABLE IF NOT EXISTS usuarios (
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usu_cpf VARCHAR(11) UNIQUE NOT NULL,
    usu_nome VARCHAR(255) NOT NULL,
    usu_data DATE,
    usu_email VARCHAR(255) UNIQUE NOT NULL,
    usu_senha VARCHAR(255) NOT NULL,
    usu_telefone VARCHAR(45),
    usu_is_admin TINYINT(1) DEFAULT 0 NOT NULL
);

-- Tabela de Unidades
CREATE TABLE IF NOT EXISTS unidades (
	id_unidade INT AUTO_INCREMENT PRIMARY KEY,
    uni_endereco VARCHAR(255) NOT NULL,
    uni_telefone VARCHAR(11)
); 

-- Tabela de Agendamentos
CREATE TABLE IF NOT EXISTS agendamentos (
	id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    agend_data DATE NOT NULL,
    agend_hora TIME NOT NULL,
    agend_exame ENUM('periapical', 'panoramica', 'teleradiografia', 'tomografia', 'documentacoes_ortodonticas', 'planigrafia_da_atm', 'radiografia_interproximais') NOT NULL,
    usuario_id INT NOT NULL,
    unidade_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
		ON DELETE CASCADE,
	FOREIGN KEY (unidade_id) REFERENCES unidades(id_unidade)
		ON DELETE RESTRICT,
	UNIQUE KEY uk_agendamento_usuario (usuario_id, agend_data, agend_hora)
);

-- Adicionando Usuário Admin
INSERT INTO usuarios 
    (usu_cpf, usu_nome, usu_data, usu_email, usu_senha, usu_telefone, usu_is_admin)
VALUES 
    ('00000000000', 'Admin', '2000-01-01', 'admin@agendmais.com', '$2y$10$BtYuiafUnT6hnh/8aV787OU4UcA1vs4IY656xV0FUJV5PGO0fDL1i', '99999999999', 1);

-- Adicionando Unidades
-- Editando coluna de unidades
ALTER TABLE unidades
ADD COLUMN uni_nome VARCHAR(255) NOT NULL UNIQUE AFTER id_unidade;

-- Adiciona a coluna para a FK
ALTER TABLE usuarios
ADD COLUMN unidade_id INT NULL AFTER id_usuario;

-- Define a Chave Estrangeira
ALTER TABLE usuarios
ADD CONSTRAINT fk_usuario_unidade
FOREIGN KEY (unidade_id) REFERENCES unidades(id_unidade)
ON DELETE SET NULL ON UPDATE CASCADE;

-- Adicionando status ao agendamento
ALTER TABLE agendamentos
ADD COLUMN agend_status ENUM(
    'Pendente',       /* Aguardando revisão do Monitor */
    'Confirmado',     /* Revisado e aprovado pela Unidade */
    'Rejeitado',      /* Revisado e não aprovado (ex: horário já ocupado) */
    'Cancelado',      /* Cancelado pelo Paciente ou Monitor */
    'Finalizado'      /* Paciente compareceu à consulta */
) NOT NULL DEFAULT 'Pendente';