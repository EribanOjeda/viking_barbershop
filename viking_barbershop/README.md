# Viking Barbershop — Starter (Overlay para Laravel 11)

Este ZIP **no contiene todo Laravel**. Es un *overlay* listo para copiarse encima de un proyecto nuevo creado con:
```
composer create-project laravel/laravel viking_barbershop
```

Incluye:
- Migraciones, Modelos y Controladores para **Clientes**, **Reservas** y **Galería**.
- Vistas Blade con **Bootstrap 5 (CDN)** y navegación básica.
- Seeders de ejemplo.
- Estructura de carpetas separada por **roles del equipo**.
- Script `scripts/setup_windows.bat` para automatizar el arranque en Windows (CMD).

> Si prefieres no usar Node/Vite, ¡no hay problema! Las vistas usan Bootstrap por CDN.

---

## Requisitos (Windows)
- PHP 8.2+ (recomendado XAMPP)
- Composer
- MySQL (MariaDB) levantado
- Git (para subir a GitHub)

## Pasos Express (CMD)
1) Crea la carpeta de trabajo y entra:
```
C:\> mkdir C:\taller\viking && cd C:\taller\viking
```

2) Crea el proyecto base de Laravel:
```
C:\taller\viking> composer create-project laravel/laravel viking_barbershop
```

3) Copia el contenido de este ZIP dentro de `viking_barbershop` **sobrescribiendo** cuando pregunte.
   - Estructura final esperada:
     - `viking_barbershop/app/...`
     - `viking_barbershop/database/...`
     - `viking_barbershop/resources/views/...`
     - etc.

4) Crea la base de datos en MySQL (por ejemplo `viking_db`).

5) Duplica `.env.example` a `.env` y configura tu conexión:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=viking_db
DB_USERNAME=root
DB_PASSWORD=
```
Luego ejecuta:
```
php artisan key:generate
php artisan migrate --seed
```

6) Levanta el servidor:
```
php artisan serve
```
Navega a `http://127.0.0.1:8000`

---

## Subir a GitHub (paso a paso)
Desde `viking_barbershop`:
```
git init
git add .
git commit -m "Proyecto Viking Barbershop: base con Bootstrap, CRUD y reservas"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/VikingBarbershop.git
git push -u origin main
```

> Si te pide usuario/contraseña, usa **token personal** de GitHub como contraseña.

---

## Estructura separada por roles
- `equipo/scrum/` — Eriban (Scrum Master): ceremonias, roadmap, actas.
- `equipo/backend/` — Jasmani (Backend): endpoints, validaciones, pruebas API.
- `equipo/frontend/` — Jose (Frontend): vistas, componentes, UX.
- `equipo/qa/` — Luis (QA): checklist, casos de prueba, hallazgos.

Cada carpeta trae un `README.md` con responsabilidades y tareas sugeridas.

---

## Módulos incluidos
- **Clientes**: CRUD completo.
- **Reservas**: crear/listar/cambiar estado; relación con cliente.
- **Galería**: listado de fotos de trabajos (para demo con URL).

> Todo con ejemplos de validación y mensajes Bootstrap.

¡Listo! Si necesitas otra estructura (por ejemplo SPA en Vue), podemos iterar.


---

## Novedades agregadas
- **Autenticación** (login/registro/logout) y **roles** (`admin`, `staff`, `cliente`).
- **Mis reservas** para usuarios autenticados.
- **Blog** con **admin CRUD** y **subida de imágenes** (usa `storage:link`).
- **Galería** permite subir imágenes al servidor.
- **API JSON** de lectura (`/api/clientes`, `/api/reservas`, `/api/posts`) y ejemplo `POST /api/reservas`.
- **Buscador global** en la navbar.
- **Seed** de admin: `admin@viking.local` / `admin123` (cámbialos).

## Comandos extra importantes
```
php artisan storage:link    # habilita /storage para imágenes
php artisan migrate --seed  # crea tablas + admin y demo
```
> **Seguridad:** cambia la contraseña del admin en cuanto entres.

## Vue 3 (opcional)
Si tu profe exige Vue, ejecuta:
```
npm install
npm run dev
```
Ya existe `resources/js/app.js` con Vue y un ejemplo de componente. Las vistas Blade seguirán funcionando incluso sin compilar.
