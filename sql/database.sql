CREATE TABLE MaterialTrailRunning  (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255),
    tipo_prenda VARCHAR(255),
    en_stock INT,
    precio INT,
    material_reciclado VARCHAR(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO MaterialTrailRunning (marca, tipo_prenda, en_stock, precio, material_reciclado) 
VALUES 
    ('Scott', 'Camiseta', 5, 29, 'SI'),
    ('Terrex', 'Pantalón', 9, 39, 'NO'),
    ('Osso', 'Zapatillas', 0, 99, 'SI'),
    ('Asics', 'Calcetines', 1, 9, 'NO'),
    ('Compressport', 'Chaqueta', 2, 79, 'SI'),
    ('Nnormal', 'Mochila', 6, 129, 'NO'),
    ('Salomon', 'Gorra', 0, 14, 'SI');
