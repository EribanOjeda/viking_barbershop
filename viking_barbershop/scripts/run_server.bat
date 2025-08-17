@echo off
cd /d %~dp0
php artisan serve
start http://127.0.0.1:8000/
