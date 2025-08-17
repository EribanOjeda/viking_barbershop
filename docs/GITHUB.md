# Subir a GitHub con Token Personal

1. Ve a **GitHub > Settings > Developer settings > Personal access tokens > Tokens (classic)** y crea un token con `repo`.
2. En CMD dentro del proyecto:
```
git init
git add .
git commit -m "init: Viking Barbershop base"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/VikingBarbershop.git
git push -u origin main
```
3. Cuando pida usuario/contraseña, usa **tu usuario** y como contraseña pega el **token**.
4. Para más commits (objetivo 120+), divide tareas en cambios pequeños y claros.