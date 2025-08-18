
CREATE TABLE IF NOT EXISTS clientes (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  telefono VARCHAR(30) NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservas (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cliente_id BIGINT UNSIGNED NOT NULL,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  servicio VARCHAR(100) NOT NULL,
  estado ENUM('pendiente','confirmada','cancelada') NOT NULL DEFAULT 'pendiente',
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT fk_reservas_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS fotos (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(120) NOT NULL,
  imagen_url VARCHAR(255) NOT NULL,
  descripcion TEXT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB;

INSERT INTO clientes (nombre,email,telefono,created_at,updated_at) VALUES
('Juan Pérez','juan@example.com','70000000', NOW(), NOW());

INSERT INTO reservas (cliente_id,fecha,hora,servicio,estado,created_at,updated_at) VALUES
(1, DATE_ADD(CURDATE(), INTERVAL 1 DAY), '10:30:00', 'Corte + Barba', 'pendiente', NOW(), NOW());

INSERT INTO fotos (titulo,imagen_url,descripcion,created_at,updated_at) VALUES
('Corte clásico','https://picsum.photos/seed/corte1/600/400','Estilo clásico con degradado suave.', NOW(), NOW()),
('Fade moderno','https://picsum.photos/seed/corte2/600/400','Fade medio con texturizado.', NOW(), NOW()),
('Barba perfilada','https://picsum.photos/seed/corte3/600/400','Perfilado y contorno con navaja.', NOW(), NOW());