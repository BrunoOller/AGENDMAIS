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
-- Senha: admin
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
    'Pendente',     
    'Confirmado',     
    'Realizado',      
    'Cancelado'      
) NOT NULL DEFAULT 'Pendente';

INSERT INTO usuarios (usu_cpf, usu_nome, usu_email, usu_senha, usu_telefone, usu_is_admin) VALUES
('12345678901', 'Ana Beatriz Santos', 'ana.santos@emailficticio.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(11) 98765-4321', 0),
('23456789012', 'Carlos Eduardo Lima', 'carlos.lima@mailtest.com.br', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(21) 99876-5432', 0),
('34567890123', 'Mariana Almeida Costa', 'mariana.costa@projetofict.net', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(31) 97654-3210', 0),
('45678901234', 'João Victor Pereira', 'jv.pereira@dados.online', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(41) 96543-2109', 0),
('56789012345', 'Fernanda Ribeiro Melo', 'fernanda.melo@maildev.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(51) 95432-1098', 0),
('67890123456', 'Rafael de Souza Junior', 'rafael.junior@emailfake.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(61) 94321-0987', 0),
('78901234567', 'Larissa Viana Gomes', 'larissa.vgomes@teste.info', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(71) 93210-9876', 0),
('89012345678', 'Pedro Henrique Dantas', 'ph.dantas@nuvem.digital', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(81) 92109-8765', 0),
('90123456789', 'Juliana Morais Castro', 'ju.castro@dataficticia.org', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(92) 91098-7654', 0),
('01234567890', 'Bruno Tavares Rocha', 'bruno.rocha@dev.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(11) 91234-5678', 0),
('10987654321', 'Luana Ferreira Borges', 'luana.ferreira@testemail.br', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(21) 92345-6789', 0),
('21098765432', 'Gustavo Santos Silva', 'gustavo.ss@ficticios.com.br', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(31) 93456-7890', 0),
('32109876543', 'Patricia Sampaio Neves', 'patricia.neves@devtools.net', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(41) 94567-8901', 0),
('43210987654', 'André Felipe Martins', 'andre.martins@exemplo.online', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(51) 95678-9012', 0),
('54321098765', 'Camila Dias Nogueira', 'camila.nogueira@email.site', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(61) 96789-0123', 0),
('65432109876', 'Lucas Pires Machado', 'lucas.machado@testing.info', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(71) 97890-1234', 0),
('76543210987', 'Érica Guedes Reis', 'erica.reis@fakedata.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(81) 98901-2345', 0),
('87654321098', 'Diego Costa Bernardes', 'diego.bernardes@corp.test', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(92) 90123-4567', 0),
('98765432109', 'Vanessa Sales Oliveira', 'vanessa.sales@emailtest.net', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(11) 91122-3344', 0),
('09876543210', 'Ricardo Mendes Rocha', 'ricardo.rocha@dadosdev.com', '$2y$10$wZ4ZjNZJlEYKtu/zwMVtGeyPEYKQm/MvDMvE8ySKug3HRipYu7AZy', '(21) 92233-4455', 0);