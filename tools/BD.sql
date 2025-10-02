CREATE DATABASE IF NOT EXISTS agendoly CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE agendoly;


-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    nome VARCHAR(70) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

-- Criação da tabela de tarefas
CREATE TABLE tarefas (
    id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    descricao VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    status BOOLEAN NOT NULL,
    id_usuario INTEGER NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Inserindo dados na tabela de usuários
INSERT INTO usuarios (nome, email, senha) VALUES
('João Silva', 'joao@email.com', '1234'),
('Maria Oliveira', 'maria@email.com', 'abcd'),
('Carlos Souza', 'carlos@email.com', 'senha123');

-- Inserindo dados na tabela de tarefas
INSERT INTO tarefas (descricao, data, status, id_usuario) VALUES
('Estudar SQL', '2025-09-26', FALSE, 1),
('Finalizar projeto de lógica', '2025-09-27', TRUE, 1),
('Fazer compras', '2025-09-28', FALSE, 2),
('Preparar apresentação', '2025-09-30', FALSE, 3);

-- Consulta para verificar a relação
SELECT u.nome, t.descricao, t.data, t.status
FROM usuarios u
JOIN tarefas t ON u.id = t.id_usuario;
