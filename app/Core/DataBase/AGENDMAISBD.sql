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
