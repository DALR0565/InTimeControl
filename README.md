# Laravel + Livewire + WireUI Starter

Este proyecto es una aplicación base desarrollada con **Laravel 12**, **Livewire 3**, y **WireUI**, ideal para construir interfaces modernas e interactivas con componentes listos para usar.

---

## ✅ Requisitos del sistema

- **PHP:** ^8.2
- **Composer**
- **Node.js:** >= 18.x
- **NPM** (o Yarn)
- **Base de datos:** MySQL

---

## 🚀 Pasos para instalar y ejecutar

1. **Clonar el repositorio y acceder a la carpeta del proyecto**

   ```bash
   git clone https://github.com/DALR0565/InTimeControl.git
   cd InTimeControl

2. **Instalar las dependencias de PHP**
    ```bash
    composer install

3. **Copiar el archivo .env y generar la clave de la aplicación**
    ```bash
    cp .env.example .env
    php artisan key:generate

4. **Instalar las dependencias de JavaScript**
    ```bash
    npm install

5. **Ejecutar migraciones y seeders**
    ```bash
    php artisan migrate:fresh --seed

6. **Levantar el servidor de Laravel e Iniciar Vite para el frontend**
    ```bash
    php artisan serve
    npm run dev