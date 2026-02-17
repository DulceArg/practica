/*
E   structura SQL no copiar en postgres, ya las crean las migraciónes

*/

-- Tabla de roles
CREATE TABLE rol (
    rol_id SERIAL PRIMARY KEY,
    nombre_rol VARCHAR(100) NOT NULL UNIQUE,
    descripcion_rol VARCHAR(255)
);

INSERT INTO rol (nombre_rol, descripcion_rol) VALUES 
('Administrador', 'Rol encargado de la administración y gestión de la tamalería'),
('Usuario', 'Rol encargado de la compra de productos de la tamalería');




-- Tabla de usuarios
CREATE TABLE usuario (
    usuario_id SERIAL PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    apellido_paterno_usuario VARCHAR(50) NOT NULL,
    apellido_materno_usuario VARCHAR(50) NOT NULL,
    correo_electronico VARCHAR(100) UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    estado VARCHAR(100) DEFAULT 'Estado de México',
    municipio VARCHAR(100),
    colonia VARCHAR(100),
    codigo_postal INT CHECK (codigo_postal BETWEEN 1000 AND 99999),
    calle VARCHAR(100),
    numero_interior INT,
    numero_exterior INT,
    contrasena VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL REFERENCES rol(rol_id)
);

-- Tabla de clientes
CREATE TABLE cliente (
    cliente_id SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    apat_cliente VARCHAR(100),
    amat_cliente VARCHAR(100),
    gmail VARCHAR(100)
);

-- Tabla de tipo de cupones
CREATE TABLE tipo_cupon (
    tipo_cupon_id SERIAL PRIMARY KEY,
    descripcion VARCHAR(100),
    porcentaje DECIMAL(5,2),
    activo BOOLEAN
);

-- Tabla de estatus
CREATE TABLE estatus (
    estatus_id SERIAL PRIMARY KEY,
    descripcion VARCHAR(100)
);

-- Tabla de cupones
CREATE TABLE cupon (
    cupon_id SERIAL PRIMARY KEY,
    codigo VARCHAR(50),
    fecha_inicio DATE,
    fecha_expiracion DATE,
    stock INT,
    cliente_id INT REFERENCES cliente(cliente_id),
    tipo_cupon_id INT REFERENCES tipo_cupon(tipo_cupon_id),
    estatus_id INT REFERENCES estatus(estatus_id)
);

-- Tabla de órdenes (ESTA MAL, BASATE DE LAS MIGRACIÓNES)
CREATE TABLE ordenes (
    orden_id SERIAL PRIMARY KEY,
    fecha_orden DATE,
    total_orden DECIMAL(10,2),
    cupon_id INT REFERENCES cupon(cupon_id),
    cliente_id INT REFERENCES cliente(cliente_id)
);

-- Tabla contador de cupones
CREATE TABLE contador_cupones (
    contador_id SERIAL PRIMARY KEY,
    total_cupones INT,
    fecha_actualizacion DATE,
    cliente_id INT REFERENCES cliente(cliente_id),
    tipo_cupon_id INT REFERENCES tipo_cupon(tipo_cupon_id)
);
