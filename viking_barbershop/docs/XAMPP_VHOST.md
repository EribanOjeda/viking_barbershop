# XAMPP: configurar VirtualHost (opcional)

1. Edita `C:\xampp\apache\conf\extra\httpd-vhosts.conf` y agrega:
```
<VirtualHost *:80>
    ServerName viking.local
    DocumentRoot "C:/taller/barberia/viking_barbershop/public"
    <Directory "C:/taller/barberia/viking_barbershop/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
2. Edita `C:\Windows\System32\drivers\etc\hosts` y agrega:
```
127.0.0.1   viking.local
```
3. Reinicia Apache en XAMPP y abre `http://viking.local`.