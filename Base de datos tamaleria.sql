CREATE DATABASE tienda_tamales;

-- Tabla CLIENTE
CREATE TABLE cliente (
    cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apat_cliente VARCHAR(50),
    amat_cliente VARCHAR(50),
    gmail VARCHAR(100)
);

-- Tabla TIPO_CUPON
CREATE TABLE tipo_cupon (
    tipo_cupon_id INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(100),
    porcentaje DECIMAL(5,2),
    activo BOOLEAN
);

-- Tabla ESTATUS
CREATE TABLE estatus (
    estatus_id INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(50)
);

-- Tabla CUPON
CREATE TABLE cupon (
    cupon_id INT PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(50),
    fecha_inicio DATE,
    fecha_expiracion DATE,
    stock INT,
    cliente_id INT,
    tipo_cupon_id INT,
    estatus_id INT,
    FOREIGN KEY (cliente_id) REFERENCES cliente(cliente_id),
    FOREIGN KEY (tipo_cupon_id) REFERENCES tipo_cupon(tipo_cupon_id),
    FOREIGN KEY (estatus_id) REFERENCES estatus(estatus_id)
);

-- Tabla ORDENES
CREATE TABLE ordenes (
    orden_id INT PRIMARY KEY AUTO_INCREMENT,
    fecha_orden DATE,
    total_orden DECIMAL(10,2),
    cupon_id INT,
    cliente_id INT,
    FOREIGN KEY (cupon_id) REFERENCES cupon(cupon_id),
    FOREIGN KEY (cliente_id) REFERENCES cliente(cliente_id)
);

-- Tabla CONTADOR_CUPONES
CREATE TABLE contador_cupones (
    contador_id INT PRIMARY KEY AUTO_INCREMENT,
    total_cupones INT,
    fecha_actualización DATE,
    cliente_id INT,
    tipo_cupon_id INT,
    FOREIGN KEY (cliente_id) REFERENCES cliente(cliente_id),
    FOREIGN KEY (tipo_cupon_id) REFERENCES tipo_cupon(tipo_cupon_id)
);
