DROP DATABASE IF EXISTS buscadoc;
CREATE DATABASE IF NOT EXISTS buscadoc;
USE buscadoc;

-- Tabla de usuarios
CREATE TABLE Usuarios (
  Id_Usuario INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(50) not null,
  Rol ENUM('Administrador', 'Usuario', 'Doctor') NOT NULL,
  Correo VARCHAR(100) NOT NULL UNIQUE,
  Foto VARCHAR(100),
  Estado BOOLEAN NOT NULL DEFAULT TRUE,
  FechaCreacion DATE NOT NULL DEFAULT CURDATE(),
  pswd VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Comentarios generales de la página
CREATE TABLE ComentariosPag (
  Id_CPagina INT PRIMARY KEY AUTO_INCREMENT,
  Comentario VARCHAR(200) NOT NULL,
  FechaHora DATETIME NOT NULL DEFAULT NOW(),
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Clientes
CREATE TABLE Clientes (
  Id_Cliente INT PRIMARY KEY AUTO_INCREMENT,
  F_Nacimiento DATE NOT NULL,
  Genero ENUM('M', 'F', 'no binario') NOT NULL,
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Doctores
CREATE TABLE Doctores (
  Id_Doctor INT PRIMARY KEY AUTO_INCREMENT,
  F_Nacimiento DATE NOT NULL,
  Idioma VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(300) NOT NULL,
  Genero ENUM('M', 'F', 'no binario') NOT NULL,
  Id_Usuario INT NOT NULL,
  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Especialidades
CREATE TABLE Especialidades (
  Id_Especialidad INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Asociación doctor-especialidad
CREATE TABLE DocEsp (
  Id_DocEsp INT PRIMARY KEY AUTO_INCREMENT,
  Id_Doctor INT NOT NULL,
  Id_Especialidad INT NOT NULL,
  Cedula VARCHAR(50) NOT NULL,
  Costo DECIMAL(6,2),
  Telefono VARCHAR(20) NOT NULL,
  Horario VARCHAR(50),
  Dias_labo VARCHAR(50),
  DireccionyRef VARCHAR(300) NOT NULL,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Especialidad) REFERENCES Especialidades(Id_Especialidad)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Reseñas a doctores
CREATE TABLE ResenaDoc (
  Id_ResenaDoc INT PRIMARY KEY AUTO_INCREMENT,
  Fecha_hora DATETIME DEFAULT NOW(),
  Puntuacion INT,
  Comentario VARCHAR(300),
  Id_Usuario INT(50) NOT NULL,
  Id_Doctor INT NOT NULL,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Usuario) REFERENCES Usuarios(Id_Usuario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Farmacias
CREATE TABLE Farmacias (
  Id_Farmacia INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100) NOT NULL,
  Descripcion VARCHAR(300) NOT NULL,
  Horario VARCHAR(50) NOT NULL,
  Dias_labo VARCHAR(50) NOT NULL,
  Foto VARCHAR(100) NOT NULL,
  DireccionyRef VARCHAR(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Reseñas a Farmacias
CREATE TABLE ResenaFar (
  Id_ResenaFar INT PRIMARY KEY AUTO_INCREMENT,
  Comentario VARCHAR(300),
  Puntuacion INT,
  Fecha_Hora DATETIME DEFAULT NOW(),
  NombreUsr VARCHAR(50) NOT NULL,
  Id_Farmacia INT,
  FOREIGN KEY (Id_Farmacia) REFERENCES Farmacias(Id_Farmacia)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Citas
CREATE TABLE Cita (
  Id_Cita INT PRIMARY KEY AUTO_INCREMENT,
  Id_Cliente INT NOT NULL,
  Id_Doctor INT NOT NULL,
  Detalle VARCHAR(300) NOT NULL,
  FechaHora_Realizacion DATETIME NOT NULL DEFAULT NOW(),
  FechaHora_Cita DATETIME NOT NULL,
  Estado ENUM('Pendiente','Aceptada','Rechazada') NOT NULL DEFAULT 'Pendiente',
  FOREIGN KEY (Id_Cliente) REFERENCES Clientes(Id_Cliente)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (Id_Doctor) REFERENCES Doctores(Id_Doctor)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Usuarios(Nombre, Correo, pswd) VALUES('Admin', 'admin@gmail.com', SHA1(123));
