CREATE TABLE `alunos` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sobrenome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `confirmsenha` VARCHAR(50) NOT NULL,
  `serie_id` INT NOT NULL
);

CREATE TABLE `series` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ano` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
);

CREATE TABLE `professores` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `confirmsenha` varchar(50) NOT NULL,
  `materia_id` int NOT NULL
);

CREATE TABLE `materias` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `serie_id` int NOT NULL
);

CREATE TABLE `provas` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `questoes_provas_id` int NOT NULL,
  `materia_id` int NOT NULL
);

CREATE TABLE `questoes_provas` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `prova_id` int NOT NULL,
  `questao_id` int NOT NULL
);

CREATE TABLE `questoes` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(500) NOT NULL,
  `dificuldade` varchar(45) NOT NULL,
  `serie_id` int NOT NULL,
  `materia_id` int NOT NULL,
  `correto` varchar(45) NOT NULL,
  `itemA` varchar(45) NOT NULL,
  `itemB` varchar(45) NOT NULL,
  `itemC` varchar(45) NOT NULL,
  `itemD` varchar(45) NOT NULL,
  `itemE` varchar(45) NOT NULL
);

ALTER TABLE `alunos` ADD FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);

ALTER TABLE `professores` ADD FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

ALTER TABLE `materias` ADD FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);

ALTER TABLE `provas` ADD FOREIGN KEY (`questoes_provas_id`) REFERENCES `questoes_provas` (`id`);

ALTER TABLE `provas` ADD FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

ALTER TABLE `questoes_provas` ADD FOREIGN KEY (`prova_id`) REFERENCES `provas` (`id`);

ALTER TABLE `questoes_provas` ADD FOREIGN KEY (`questao_id`) REFERENCES `questoes` (`id`);

ALTER TABLE `questoes` ADD FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);

ALTER TABLE `questoes` ADD FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);
