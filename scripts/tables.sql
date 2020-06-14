

CREATE DATABASE db_geren_lojas CHARACTER SET utf8 COLLATE utf8_general_ci;

USE db_geren_lojas;

CREATE TABLE tb_lojas (
	id_loja INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nm_loja VARCHAR(100) NOT NULL,
    tel_loja VARCHAR(13) NOT NULL,
    end_loja VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_loja)
);

CREATE TABLE tb_produtos (
	id_produto INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_loja INT UNSIGNED NOT NULL,
    nm_produto VARCHAR(100) NOT NULL,
    preco_produto DECIMAL NOT NULL,
    qtd_produto INT UNSIGNED NOT NULL,
    PRIMARY KEY(id_produto)
);

alter table tb_produtos add constraint fk_id_loja_produtos 
foreign key(id_produto) references tb_lojas(id_loja);