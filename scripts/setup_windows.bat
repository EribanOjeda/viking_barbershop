@echo off
REM ===============================================
REM  Viking Barbershop - Setup Windows (CMD)
REM  Requisitos: PHP, Composer, MySQL (XAMPP), Git
REM ===============================================

set PROJ=viking_barbershop
echo [1/6] Creando proyecto Laravel en %PROJ%...
composer create-project laravel/laravel %PROJ% || goto :error

echo [2/6] Copiando archivos del starter...
xcopy /E /I /Y app %PROJ%\app >nul
xcopy /E /I /Y database %PROJ%\database >nul
xcopy /E /I /Y resources %PROJ%\resources >nul
xcopy /E /I /Y routes %PROJ%\routes >nul
xcopy /E /I /Y equipo %PROJ%\equipo >nul
xcopy /E /I /Y docs %PROJ%\docs >nul
copy .env.example %PROJ%\.env >nul
copy .gitignore %PROJ%\.gitignore >nul
copy README.md %PROJ%\README_STARTER.md >nul

echo [3/6] Generando APP_KEY...
cd %PROJ%
php artisan key:generate || goto :error

echo [4/6] *** IMPORTANTE ***
echo - Configura la base de datos en .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
pause

echo [5/6] Migrando y sembrando datos...
php artisan migrate --seed || goto :error

echo [6/6] ¡Listo! Para iniciar el servidor ejecuta:
echo php artisan serve
exit /b 0

:error
echo Ocurrió un error. Revisa los requisitos y vuelve a intentar.
exit /b 1
