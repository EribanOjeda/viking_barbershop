 # Viking Barbershop

**Proyecto Web (Laravel + Bootstrap)**  
Reservas, clientes, galería con subida de imágenes, blog y autenticación con roles (admin/staff/cliente).

## Integrantes
- Eriban Wagner Ojeda Ramirez — Scrum Master / Product Owner
- Jasmani — Backend - se clono con exito
- Jose — Frontend
- Luis Anacri — QA / Testing - Clonacion exitosa, base de datos actualizada

## Instalación rápida
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
