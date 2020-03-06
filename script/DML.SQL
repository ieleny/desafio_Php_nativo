
-- TABELA CATEGORIA

INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Comedy', '1');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Horror', '2');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Triller', '3');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Documentary', '4');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Animation', '5');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Children', '6');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Fantasy', '7');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Drama', '8');
INSERT INTO `produtos`.`categoria` (`nome_categoria`, `codigo_categoria`) VALUES ('Musical', '9');

-- TABELA PRODUTOS
INSERT INTO `produtos`.`produtos` (`sku_produtos`, `quantidade_produtos`, `preco_produtos`, `nome_produtos`, `descricao_produtos`) VALUES ('42254-011', '59', '2300.39', 'Eplerenone', 'Bypass Innominate Artery to Bilateral Upper Leg Artery with Synthetic Substitute, Open Approach');


-- TABELA DAS PRODUTOS
INSERT INTO `produtos`.`produtos_has_categoria` (`produtos_id_produtos`, `categoria_id_categoria`) VALUES ('1', '1');
INSERT INTO `produtos`.`produtos_has_categoria` (`produtos_id_produtos`, `categoria_id_categoria`) VALUES ('1', '2');
INSERT INTO `produtos`.`produtos_has_categoria` (`produtos_id_produtos`, `categoria_id_categoria`) VALUES ('1', '3');

