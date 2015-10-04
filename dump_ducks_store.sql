CREATE DATABASE `ducks_store` CHARACTER SET utf8;
USE `ducks_store`;

CREATE TABLE `products`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(150),
	`description` VARCHAR(255),
	`price` FLOAT(7,2),
	`photo` VARCHAR(255),
    `id_cat` INT,
    `created_at` TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE `categories`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(150),
	`description` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `orders`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`num_order` VARCHAR(20),
	`fio` VARCHAR(150),
	`address` VARCHAR(255),
	`email` VARCHAR(50),
    `ord_cont` VARCHAR(255),
	`ord_comment` VARCHAR(255),
    `created_at` TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE `order_product`
(
	`num_order` VARCHAR(20),
	`id_prod` INT,
	`amount_prod` INT
);


INSERT INTO `products`(`name`, `description`, `price`, `id_cat`, `created_at`) VALUES ('Утка 01','Маленькая резиновая утка',100,1,now());

INSERT INTO `products`(`name`, `description`, `price`, `id_cat`,`photo`, `created_at`) VALUES ('Утка 01','Маленькая резиновая утка',100,1,'/web/img/catalog-pics/2.jpg',now()),('Новая уточка','Жёлтая резиновая уточка',250,1,'/web/img/catalog-pics/3.jpg',now()),('Уточка SuperDuck','Резиновая уточка SuperDuck',180,1,'/web/img/catalog-pics/4.jpg',now());

INSERT INTO `products`(`name`, `description`, `price`, `id_cat`,`photo`, `created_at`) VALUES ('Утка для ванной','Маленькая резиновая утка',100,1,'/web/img/catalog-pics/5.jpg',now()),('Утка в костюме','Жёлтая резиновая уточка',250,1,'/web/img/catalog-pics/6.jpg',now()),('Уточка Ducky','Резиновая уточка SuperDuck',180,1,'/web/img/catalog-pics/7.jpg',now());

INSERT INTO `products`(`name`, `description`, `price`, `id_cat`,`photo`, `created_at`) VALUES ('Утка-игрушка','Игрушечная утка из резины',120,2,'/web/img/catalog-pics/8.jpg',now());

INSERT INTO `products`(`name`, `description`, `price`, `id_cat`,`photo`, `created_at`) VALUES ('Утка-пират','Маленькая резиновая утка',300,1,'/web/img/catalog-pics/9.jpg',now()),('Утиная пара','Жёлтая резиновая уточка',350,1,'/web/img/catalog-pics/10.jpg',now()),('Набор уток','Резиновые уточки SuperDuck',500,1,'/web/img/catalog-pics/11.jpg',now()),('Утка-Бэтмен','Резиновые уточки SuperDuck',110,1,'/web/img/catalog-pics/12.jpg',now()),('Большая утка','Резиновые уточки SuperDuck',350,1,'/web/img/catalog-pics/13.jpg',now()),('Жёлтые уточки(5 шт)','Резиновые уточки SuperDuck',550,2,'/web/img/catalog-pics/14.jpg',now());

INSERT INTO `categories`(`name`, `description`) VALUES ('Мини-утки','Это не просто игрушка для ванны, но и хороший подарок увлеченному человеку');

INSERT INTO `categories`(`name`, `description`) VALUES ('С наполнителем','Утки с пенопластовым наполнителем'),('Для ванной','Резиновые утки для ванной');

#товары для главной страницы
SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 6;



