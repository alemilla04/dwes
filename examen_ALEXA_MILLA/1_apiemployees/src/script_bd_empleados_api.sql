DROP DATABASE IF EXISTS empleados_api;
CREATE DATABASE empleados_api CHARACTER SET utf8mb4;
USE empleados_api;


CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `employees` (`name`, `address`, `salary`) VALUES
('Diego Heredia', 'C\ Alamo, Lorca', 3000),
('Adolfo Martin', 'C\ Alamo, Lorca', 2500),
('Julio Iglesias', 'Miami', 12500),
('Chiquito de la Calzada', 'El cielo', 0),
('Juan Antonio Cuello', 'Murcia', 2500);





