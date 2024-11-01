CREATE TABLE registros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    documento INT,
    direccion VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    token VARCHAR(255),
    token_expiration DATETIME
);
