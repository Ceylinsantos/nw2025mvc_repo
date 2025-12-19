CREATE TABLE `personas` (
    `persona_id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `apellido` VARCHAR(100) NOT NULL,
    `edad` INT NOT NULL,
    `estado` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

INSERT INTO `personas` (`nombre`, `apellido`, `edad`, `estado`) VALUES
('Diego', 'Ortega', 33, 'ACT'),
('Elena', 'Torres', 23, 'INA'),
('Fernando', 'Santos', 38, 'ACT'),
('Isabel', 'Ruiz', 21, 'ACT'),
('Andrés', 'Flores', 36, 'INA'),
('Josue', 'Ramirez', 34, 'ACT'),
('Hellen', 'Torres', 28, 'ACT'),
('Fernando', 'Santos', 37, 'ACT'),
('Maria', 'Corral', 29, 'ACT'),
('Andrasa', 'Sorto', 40, 'ACT'),
('Deris', 'Ortiz', 33, 'ACT'),
('Ceylin', 'Santo', 69, 'ACT'),
('Alejandra', 'Sarrez', 40, 'ACT'),
('Isabelis', 'Ortez', 21, 'ACT'),
('Julio', 'Fuentes', 36, 'INA'),
('Brayan', 'Orca', 34, 'ACT'),
('Patrick', 'perez', 23, 'INA'),
('Josue', 'Sisnero', 38, 'ACT'),
('Antonia', 'Milla', 21, 'ACT'),
('Camilia', 'Medina', 36, 'ACT');