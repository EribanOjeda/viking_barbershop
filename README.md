<<<<<<< HEAD
# Viking Barbershop

![Laravel](https://img.shields.io/badge/Laravel-11/12-red)
![PHP](https://img.shields.io/badge/PHP-%3E=8.2-777bb4)
![MySQL](https://img.shields.io/badge/MySQL-8.x-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3)

**Fullstack Project** · **Proyecto Web de Viking Barbershop**  
Gestión completa para barbería: **reservas**, **clientes**, **galería con subida de imágenes**, **blog**, **auth** con **roles** (admin/staff/cliente), **buscador** y **API JSON**.

---

## 👥 Integrantes
- **Eriban Wagner Ojeda Ramirez** — Scrum Master / Product Owner
- **Jasmani** — Backend
- **Jose** — Frontend
- **Luis** — QA / Testing

**Curso:** TALLER EN APLICACIONES EN INTERNET

---

## ✨ Funcionalidades
- **Clientes** (CRUD) y **Reservas** (crear/listar/cambiar estado).
- **Galería** con subida de imágenes (storage público).
- **Blog** con panel **Admin** (crear/editar/publicar).
- **Autenticación** (registro/login/logout) con **roles**.
- **Buscador global** (clientes/reservas) desde la navbar.
- **API JSON** de lectura: `/api/clientes`, `/api/reservas`, `/api/posts`.
- **Responsive** con Bootstrap 5.
- (Opcional) **Vue 3 + Vite** para widget de reservas.

---

## 🧱 Tecnologías
- PHP 8.2+, Laravel 11/12
- MySQL / MariaDB
- Bootstrap 5
- (Opcional) Node.js + Vite + Vue 3

---

## 🚀 Instalación
> Si tu proyecto está en **subcarpeta** `viking_barbershop/`, primero: `cd viking_barbershop`

=======
 # Viking Barbershop

**Proyecto Web (Laravel + Bootstrap)**  
Reservas, clientes, galería con subida de imágenes, blog y autenticación con roles (admin/staff/cliente).

## Integrantes
- Eriban Wagner Ojeda Ramirez — Scrum Master / Product Owner
- Jasmani — Backend - se clono con exito
- Jose — Frontend
- Luis Anacri — QA / Testing - Clonacion exitosa, base de datos actualizada

## Instalación rápida
>>>>>>> 42625af4dc05ee97f3b98088743dcbab4bda0989
```bash
composer install
cp .env.example .env
php artisan key:generate
<<<<<<< HEAD

# Configura tu .env (ejemplo local)
# DB_DATABASE=viking_db
# DB_USERNAME=root
# DB_PASSWORD=

=======
>>>>>>> 42625af4dc05ee97f3b98088743dcbab4bda0989
php artisan migrate --seed
php artisan storage:link
php artisan serve
