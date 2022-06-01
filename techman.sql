-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 00:06
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `techman`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` longtext NOT NULL,
  `equipamento` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `equipamento`, `perfil`, `data`) VALUES
(1, 'Deverá fazer o download do aplicativo da razer para alterar a cor do mouse.', 2, 4, '2020-09-07 18:00:00'),
(2, 'Problema de aquecimento no processador ap?s 1 ano de uso.', 2, 2, '2020-05-04 07:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(11) NOT NULL,
  `equipamento` varchar(180) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `equipamento`, `imagem`, `descricao`, `ativo`, `data`) VALUES
(1, 'Torno Mecânico 500mm Modelo BV20L 220V - TTM520 - Tander', 'Torno_Mecanico_500mm.png', 'O Torno Mecânico Tander TTM520 é uma ferramenta utilizada por vários profissionais na confecção e acabamento de inúmeras peças metálicas, tais como: eixos, polias, pinos, roscas, peças cilíndricas internas e externas, cones, esferas, entre outros. \r\nEste torno vem com motor monofísico de 220V e 550W de potência, o que lhe confere maior torque e vida útil, menor consumo de energia e baixo índice de manutenção. \r\nPossui interruptor magnético com a função de travagem de emergência, rotação frente/reversa e a função de proteção ao torno e aos componentes elétricos.', 1, '2019-10-01 14:54:20'),
(2, 'Processador Intel Core i9-7920X Skylake, Cache 16.5MB, 2.9GHz (4.3GHz Max Turbo), LGA 2066 - BX80673I97920X', 'Intel_Core_i9.png', 'Com esse processador inovador e incrível você desfruta ao máximo o verdadeiro potencial do seu computador e desfruta da mais pura velocidade. Maximize o seu desempenho seja trabalhando, jogando, navegando ou assistindo o seu filme preferido, com esse processador você pode tudo!', 1, '2019-10-01 15:00:20'),
(3, 'Monitor, Dell, U2518D, UltraSharp, Preto e Suporte em Alum?nio, 25\"', 'Monitor_Dell.png', 'Dê vida ao seu trabalho com uma tela de 25 polegadas quase sem bordas que conta com detalhes em cores vívidas e consistentes graças a tecnologia hdr, resolução qhd e ângulo de visão ultra-amplo. Aumente sua performance com os recursos dell display manager, dell easy arrange e trabalhe confortavelmente graça a um suporte totalmente ajustável e recurso confortview.', 0, '2018-10-01 10:00:20'),
(4, 'Mouse Gamer Razer Deathadder Essential ?ptico 5 Bot?es 4G 6.400 DPI', 'Mouse_Razer.png', 'Nada melhor do que um mouse gamer com tecnologia de ponta para qualificar seus comandos e aprimorar suas jogadas nos games. Com este Mouse Gamer Razer, sua atuação nas batalhas gamers serão ainda mais bem-sucedidas, com desempenho acima da média e desenvoltura arrasadora, que vai deixar seus oponentes impressionados. O mouse Razer Deathadder Essential tem sensor óptico de 6400 DPI de 4G, 5 botões, design moderno e ergonômico, especialmente projetado para jogadores destros, e uma empunhadura lateral emborrachada que garante mais firmeza ao manuseio do equipamento, melhorando as respostas obtidas pelos players. O mouse Razer ainda oferece ajuste de sensibilidade, pezinhos Ultraslick silenciosos, cabo ultra resistente de fibra trançada e Modo Always-On, que mantém o mouse ligado mesmo quando o equipamento estiver inativo.É um mouse gamer Razer para ninguém botar defeito, com todas as funções e especificações técnicas que você precisa para ter mais produtividade nos jogos. O Razer Deathadder Essential é realmente essencial e ainda tem o diferencial de estar habilitado para Razer Synapse 3 e de ser compatível com PC e Mac, com porta USB. Conheça o modelo e faça um investimento seguro!', 1, '2017-10-01 09:00:20'),
(5, 'All-in-One Media Keyboard', 'Teclado_Microsoft.png', 'O All-in-One Media Keyboard é o dispositivo ideal para sua sala ou home office. Com teclado em tamanho natural e trackpad multitoque integrado, é possível digitar, passar o dedo, arrastar, fazer zoom e clicar facilmente. O teclado com teclas de atalho de mídia personalizáveis permite que a Web e suas músicas, fotos e filmes favoritos estejam a seu alcance. O teclado também tem um design resistente, portanto, não é necessário se preocupar com esbarrões, quedas ou derramamentos comuns. O All-in-One Media Keyboard é tudo o que você precisa para digitar confortavelmente e navegar sem esforço.', 0, '2017-10-01 13:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int(11) NOT NULL,
  `perfil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id`, `perfil`) VALUES
(1, 'Comum'),
(2, 'Administrador'),
(3, 'Tecnico'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `senha` int(11) NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `senha`, `perfil`) VALUES
(1, 111111, 1),
(2, 212121, 2),
(3, 414141, 4),
(4, 313131, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
