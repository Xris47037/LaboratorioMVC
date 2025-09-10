CREATE DATABASE IF NOT EXISTS laboratorio;
USE laboratorio;

-- Tablas de referencia
CREATE TABLE IF NOT EXISTS Rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS EstadoEquipo (
    id_estado_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS EstadoPrestamo (
    id_estado_prestamo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS EstadoDevolucion (
    id_estado_devolucion INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS TipoAlerta (
    id_tipo_alerta INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS TipoReporte (
    id_tipo_reporte INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS TipoImportExport (
    id_tipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(50) UNIQUE NOT NULL
);

-- Tablas principales
CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES Rol(id_rol)
);

CREATE TABLE IF NOT EXISTS Equipo (
    id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_adquisicion DATE NOT NULL,
    id_estado_equipo INT NOT NULL,
    cantidad_total INT NOT NULL,
    cantidad_disponible INT NOT NULL,
    FOREIGN KEY (id_estado_equipo) REFERENCES EstadoEquipo(id_estado_equipo)
);

CREATE TABLE IF NOT EXISTS Prestamo (
    id_prestamo INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha_prestamo DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_devolucion DATETIME NULL,
    id_estado_prestamo INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_estado_prestamo) REFERENCES EstadoPrestamo(id_estado_prestamo)
);

CREATE TABLE IF NOT EXISTS DetallePrestamo (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_prestamo INT NOT NULL,
    id_equipo INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_prestamo) REFERENCES Prestamo(id_prestamo),
    FOREIGN KEY (id_equipo) REFERENCES Equipo(id_equipo)
);

CREATE TABLE IF NOT EXISTS Devolucion (
    id_devolucion INT AUTO_INCREMENT PRIMARY KEY,
    id_prestamo INT UNIQUE,
    id_equipo INT NOT NULL,
    fecha_devolucion DATETIME DEFAULT CURRENT_TIMESTAMP,
    observaciones TEXT,
    id_estado_devolucion INT NOT NULL,
    FOREIGN KEY (id_prestamo) REFERENCES Prestamo(id_prestamo),
    FOREIGN KEY (id_equipo) REFERENCES Equipo(id_equipo),
    FOREIGN KEY (id_estado_devolucion) REFERENCES EstadoDevolucion(id_estado_devolucion)
);

CREATE TABLE IF NOT EXISTS Alerta (
    id_alerta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_tipo_alerta INT NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_alerta DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_tipo_alerta) REFERENCES TipoAlerta(id_tipo_alerta)
);

CREATE TABLE IF NOT EXISTS Reporte (
    id_reporte INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_reporte INT NOT NULL,
    fecha_generacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    generado_por INT NOT NULL,
    FOREIGN KEY (generado_por) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_tipo_reporte) REFERENCES TipoReporte(id_tipo_reporte)
);

CREATE TABLE IF NOT EXISTS ImportExport (
    id_import_export INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo INT NOT NULL,
    descripcion TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    realizado_por INT NOT NULL,
    FOREIGN KEY (realizado_por) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_tipo) REFERENCES TipoImportExport(id_tipo)
);

-- Inserts de referencia y datos de prueba
INSERT IGNORE INTO Rol (nombre_rol) VALUES ('usuario'), ('administrador');
INSERT IGNORE INTO EstadoEquipo (nombre_estado) VALUES ('disponible'), ('en_prestamo'), ('mantenimiento');
INSERT IGNORE INTO EstadoPrestamo (nombre_estado) VALUES ('activo'), ('devuelto'), ('retrasado');
INSERT IGNORE INTO EstadoDevolucion (nombre_estado) VALUES ('bueno'), ('danado'), ('perdido');
INSERT IGNORE INTO TipoAlerta (nombre_tipo) VALUES ('disponibilidad'), ('retraso'), ('mantenimiento');
INSERT IGNORE INTO TipoReporte (nombre_tipo) VALUES ('inventario'), ('prestamos'), ('devoluciones');
INSERT IGNORE INTO TipoImportExport (nombre_tipo) VALUES ('importacion'), ('exportacion');

-- Usuarios (con contraseñas de ejemplo, en texto simple para pruebas)
INSERT IGNORE INTO Usuario (nombre, apellido, correo, contrasena, id_rol) VALUES
('Juan', 'Pérez', 'juan@example.com', '$2y$10$abcdefghijklmnopqrstuv', 1),
('Ana', 'Gómez', 'ana@example.com', '$2y$10$abcdefghijklmnopqrstuv', 2);

-- Equipos
INSERT IGNORE INTO Equipo (nombre_equipo, descripcion, fecha_adquisicion, id_estado_equipo, cantidad_total, cantidad_disponible) VALUES
('Microscopio', 'Microscopio óptico para laboratorio', '2023-05-10', 1, 5, 4),
('Proyector', 'Proyector HD para presentaciones', '2022-09-15', 1, 2, 2);

-- Prestamos
INSERT IGNORE INTO Prestamo (id_usuario, fecha_prestamo, fecha_devolucion, id_estado_prestamo) VALUES
(1, NOW(), NULL, 1),
(2, NOW(), NOW(), 2);

-- DetallePrestamo
INSERT IGNORE INTO DetallePrestamo (id_prestamo, id_equipo, cantidad) VALUES
(1, 1, 1),
(2, 2, 1);

-- Devolucion
INSERT IGNORE INTO Devolucion (id_prestamo, id_equipo, observaciones, id_estado_devolucion) VALUES
(1, 1, 'Equipo en buen estado', 1);

-- Alertas
INSERT IGNORE INTO Alerta (id_usuario, id_tipo_alerta, mensaje) VALUES
(1, 2, 'El usuario tiene un préstamo retrasado'),
(2, 1, 'Equipo disponible para reserva');

-- Reportes
INSERT IGNORE INTO Reporte (id_tipo_reporte, generado_por) VALUES
(1, 2),
(2, 2);

-- ImportExport
INSERT IGNORE INTO ImportExport (id_tipo, descripcion, realizado_por) VALUES
(1, 'Importación de datos iniciales', 2),
(2, 'Exportación de inventario', 2);

