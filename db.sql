CREATE DATABASE IF NOT EXISTS `proyecto`;
USE `proyecto`;

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,                  -- Clave primaria, con incremento automático
  `username` VARCHAR(16) COLLATE utf8mb4_swedish_ci NOT NULL UNIQUE, -- Nombre de usuario, no nulo
  `password` VARCHAR(100) COLLATE utf8mb4_swedish_ci NOT NULL, -- Contraseña, no nula
  `ip` VARCHAR(45) COLLATE utf8mb4_swedish_ci DEFAULT NULL,    -- Dirección IP del usuario, admite IPv4 e IPv6
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,         -- Fecha de creación, con valor predeterminado
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Fecha de actualización
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

CREATE TABLE `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,      -- Identificador único de cada producto
    `description` VARCHAR(255) NOT NULL,      -- Descripción del producto
    `date` DATE NOT NULL,                    -- Fecha asociada al producto (por ejemplo, de creación o registro)
    `status` ENUM('activo', 'inactivo') NOT NULL, -- Estado del producto (activo/inactivo)
    `purchase_p` DECIMAL(10, 2) NOT NULL,       -- Precio de compra del producto
    `sale_p` DECIMAL(10, 2) NOT NULL,        -- Precio de venta del producto
    `stock` INT NOT NULL                      -- Cantidad disponible en stock
);

INSERT INTO `products` (`description`, `date`, `status`, `purchase_p`, `sale_p`, `stock`) VALUES
('Smartphone Samsung Galaxy S22', '2024-11-27', 'activo', 500.00, 650.00, 100),
('Laptop Apple MacBook Pro M2', '2024-11-27', 'activo', 1200.00, 1500.00, 50),
('Auriculares inalámbricos Sony WH-1000XM5', '2024-11-27', 'activo', 350.00, 450.00, 200),
('Smartwatch Garmin Fenix 7', '2024-11-27', 'activo', 450.00, 600.00, 150),
('Tableta Samsung Galaxy Tab S8', '2024-11-27', 'activo', 650.00, 800.00, 80),
('PC de escritorio HP Omen 30L', '2024-11-27', 'activo', 1500.00, 1800.00, 40),
('Cámara digital Canon EOS R5', '2024-11-27', 'activo', 2500.00, 3000.00, 30),
('Auriculares Bose QuietComfort 45', '2024-11-27', 'activo', 400.00, 500.00, 120),
('Monitor LG UltraWide 34GN850-B', '2024-11-27', 'activo', 500.00, 650.00, 70),
('Teclado mecánico Razer Huntsman V2', '2024-11-27', 'activo', 150.00, 200.00, 150),
('Mouse Logitech G Pro X', '2024-11-27', 'activo', 80.00, 120.00, 200),
('Auriculares Apple AirPods Pro', '2024-11-27', 'activo', 220.00, 300.00, 250),
('Disco duro externo Seagate 2TB', '2024-11-27', 'activo', 60.00, 90.00, 180),
('Proyector Epson EF-100', '2024-11-27', 'activo', 800.00, 1000.00, 60),
('Router TP-Link Archer AX6000', '2024-11-27', 'activo', 200.00, 300.00, 110);
