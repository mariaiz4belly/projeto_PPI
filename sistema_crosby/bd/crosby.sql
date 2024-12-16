CREATE DATABASE IF NOT EXISTS sistema_estoque;

USE sistema_estoque;

CREATE TABLE IF NOT EXISTS revendedor(
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) PRIMARY KEY,  -- Chave primária.
    email VARCHAR(100) NOT NULL,
    senha CHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS produto(
	id_produto INT AUTO_INCREMENT PRIMARY KEY, -- Chave primária.
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS tipo_movimentacao(
    id_tipo INT AUTO_INCREMENT PRIMARY KEY, -- Chave primária.
    nome ENUM('entrada', 'saída') NOT NULL
);

CREATE TABLE IF NOT EXISTS movimentacao(
    id_movimentacao INT AUTO_INCREMENT PRIMARY KEY, -- Chave primária.
    data_movimentacao DATE NOT NULL,
    quantidade_produto INT UNSIGNED NOT NULL,
    id_produto INT NOT NULL, -- Relacionado à tabela Produto.
    id_tipo INT NOT NULL, -- Relacionado à tabela tipo_movimentacao.
    FOREIGN KEY (id_produto) REFERENCES produto(id_produto), -- Chave estrangeira.
    FOREIGN KEY (id_tipo) REFERENCES tipo_movimentacao(id_tipo) -- Chave estrangeira.
);