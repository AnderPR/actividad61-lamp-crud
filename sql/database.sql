CREATE TABLE MaterialTrailRunning  (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255),
    tipo_prenda VARCHAR(255),
    en_stock BOOLEAN,
    precio DECIMAL(10, 2),
    material_reciclado BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO MaterialTrailRunning (marca, tipo_prenda, en_stock, precio, material_reciclado) 
VALUES 
    ('Scott', 'Camiseta', true, 29.99, true),
    ('Terrex', 'Pantalón', false, 39.99, false),
    ('Osso', 'Zapatillas', true, 99.99, true),
    ('Asics', 'Calcetines', true, 9.99, false),
    ('Compressport', 'Chaqueta', false, 79.99, true),
    ('Nnormal', 'Mochila', true, 129.99, false),
    ('Salomon', 'Gorra', false, 14.99, true);
