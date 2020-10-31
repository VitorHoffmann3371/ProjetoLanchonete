-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2020 às 17:25
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `situacao` enum('HABILITADO','DESABILITADO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo`, `nome`, `endereco`, `numero`, `situacao`) VALUES
(1, 'Fernando', 'Marechal Deodoro', 414, 'HABILITADO'),
(2, 'Joao', 'Marilia Mendonça', 132, 'DESABILITADO'),
(3, 'Douglas', 'Silverio Santos', 154, 'HABILITADO'),
(4, 'Joao Souza', 'Silverio Santos', 563, 'DESABILITADO'),
(5, 'Joao Souza', 'Silverio Santos', 515, 'HABILITADO'),
(6, 'Almir Camolesi', 'Rua Joaquim Barbosa', 4123, 'DESABILITADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `codigo` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_und` decimal(6,2) NOT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item_pedido`
--

INSERT INTO `item_pedido` (`codigo`, `nome_produto`, `quantidade`, `preco_und`, `observacao`, `cod_usuario`, `cod_cliente`, `data_hora`) VALUES
(15, 'Coca-Cola2', 0, '0.00', NULL, NULL, NULL, '2020-10-15 17:02:48'),
(17, 'Caramelo', 0, '0.00', NULL, NULL, NULL, '2020-10-15 17:03:06'),
(32, 'Bolo de chocolate', 4, '10.00', '', 1, 3, '2020-10-17 17:31:35'),
(35, 'Bolo de chocolate', 3, '10.00', 'Nenhuma', 1, 1, '2020-10-17 17:43:17'),
(36, 'Hamburguer', 2, '14.90', '', 1, 5, '2020-10-17 17:56:09'),
(39, 'Bolo de Cenoura', 2, '8.00', '', 1, 1, '2020-10-18 16:54:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `info_adicional` varchar(200) DEFAULT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `situacao` enum('HABILITADO','DESABILITADO') NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo`, `nome`, `categoria`, `valor`, `foto`, `info_adicional`, `codigo_usuario`, `situacao`, `data_hora`) VALUES
(17, 'Coca-Cola2', 'bebida', '12.00', 'Capturar.PNG', 'tudo', 1, 'DESABILITADO', '2020-09-24 02:54:11'),
(18, 'Cachorro Quente', 'Lanche', '8.00', '', '', 1, 'DESABILITADO', '2020-09-24 02:59:48'),
(20, 'Caramelo', 'Doce', '4.00', '', 'Extremamente saboroso!!', 1, 'DESABILITADO', '2020-09-25 23:54:05'),
(21, 'Caramelo', 'Doce', '4.00', '', '', 1, 'DESABILITADO', '2020-09-25 23:23:34'),
(22, 'Batata Frita', 'batatas', '3.50', 'batatafrita.png', 'bastante oleosa', 1, 'DESABILITADO', '2020-10-16 01:59:16'),
(23, 'Milk Shake', 'Bebida', '5.00', '', '', 1, 'DESABILITADO', '2020-09-27 03:02:47'),
(24, 'Bolo de chocolate', 'bolos', '2.00', '', '', 1, 'DESABILITADO', '2020-09-27 03:06:16'),
(25, 'Banana Caramelada', 'Doce', '4.00', '', '', 1, 'DESABILITADO', '2020-09-27 03:14:16'),
(28, 'Coca-Cola2', 'bebida', '31.00', '', '', 1, 'DESABILITADO', '2020-09-27 04:39:10'),
(29, 'Coca-Cola2', 'bebida', '31.00', '', '', 1, 'DESABILITADO', '2020-09-27 04:39:32'),
(30, 'Cachorro Quente', 'Lanche', '13.00', '', '', 1, 'DESABILITADO', '2020-09-27 04:40:15'),
(31, 'nada haver', 'lixo', '0.30', '', '', 1, 'DESABILITADO', '2020-09-27 18:31:13'),
(32, 'Bolo de chocolate', 'bolos', '10.00', 'bolochocolate.png', '', 1, 'HABILITADO', '2020-10-17 18:04:08'),
(33, 'Bolo de Cenoura', 'bolos', '8.00', 'bolocenoura.png', '', 1, 'HABILITADO', '2020-10-16 20:04:22'),
(34, 'Especial Duplo', 'Lanche', '14.00', 'especial.png', '', 1, 'HABILITADO', '2020-10-15 17:07:13'),
(35, 'Lanchão', 'Lanche', '17.00', 'lanche.png', 'Grande Demais, proporcionalmente ao sabor', 1, 'HABILITADO', '2020-10-17 17:44:31'),
(36, 'Bolo', 'bolos', '33.70', 'bolochocolate.png', 'muito gostoso', 1, 'DESABILITADO', '2020-10-16 22:23:44'),
(37, 'Hamburguer', 'Lanche', '14.90', 'banner.png', '', 1, 'DESABILITADO', '2020-10-17 18:00:55'),
(38, 'Hamburguer', 'Lanche', '11.00', 'banner.png', 'Muito Saboroso!!', 1, 'DESABILITADO', '2020-10-18 18:19:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `situacao` enum('Habilitado','Desabilitado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `email`, `senha`, `data_registro`, `data_alteracao`, `situacao`) VALUES
(1, 'Vitor Hoffmann', 'vitorhoffmann@hotmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-22 00:09:58', '2020-09-22 00:09:58', 'Habilitado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`codigo`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
