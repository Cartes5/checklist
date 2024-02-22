# Checklist

Este es un proyecto que consiste en una aplicación web de checklist con un frontend en Vue.js y un backend en Laravel.

## Instalación

1. Clona este repositorio en tu máquina local:
https://github.com/Cartes5/testtask-GalvezGil.git

### Frontend (Vue.js)

1. Ve al directorio del frontend:
cd checklist/checklist-frontend

2. Instala las dependencias:

npm install

3. Inicia el servidor de desarrollo:

npm run serve

#### Backend (Laravel)

1. Ve al directorio del backend:

cd checklist/checklist-backend
2. Instala las dependencias:

composer install

3. Abrir el archivo .env

Configura tu base de datos en el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=contraseña_de_tu_base_de_datos

4. Ejecuta las migraciones para crear la estructura de la base de datos:

php artisan migrate

5. Inicia el servidor:

php artisan serve

## Uso

Ahora puedes acceder a la aplicación desde tu navegador web:

- Frontend: [http://localhost:8080](http://localhost:8080)
- Backend: [http://localhost:8000](http://localhost:8000)
